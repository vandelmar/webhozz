<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category')); 
    }

    public function create()
    {
           return view('category.create');
    }

    public function store()
    {
        // insert data
           Category::create([
               'name'=> request('name')
           ]);

        // redirect
           return redirect('/category');
    }
}
