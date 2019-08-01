<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // klo search ada isinya.
        if(request('search') !='')
        {
            $category = Category::where('name', 'like', '%'.request('search').'%')->get();
        }
        else
        {
            $category = Category::paginate(5);
        }
        return view('category.index', compact('category'));
    }
        
    public function create()
    {
           return view('category.create');

    }
    
    public function store()
    {
        Category::create(['name'=> request('name')]);
        // redirect
        return redirect( '/category');
    }

    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit', compact('category'));
    }
    
    public function update($id)
    {
        // query ke database buat ambil category dari id=$id
        $category=Category::find($id);

        //update
        $category->update(['name'=> request('dari_form')]);
        
        // redirect
        return redirect( '/category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category');
    }
    
}   
