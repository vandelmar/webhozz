<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\product;

class ProductController extends Controller
{
    public function index()
    {
        // klo search ada isinya.
        if(request('search') !='')
        {
            $product = product::where('name', 'like', '%'.request('search').'%')->get();
        }
        else
        {
            $product = product::all();
        }
        return view('product.index', compact('product'));
    }
        
    public function create()
    {
        $category= Category::all();
           return view('product.create', compact('category'));

    }
    
    public function store()
    {
        product::create([
            'category_id' => request('category_id'),
            'name'=> request('name'),
            'price'=> request('price'),
        ]);

        // redirect
        return redirect( '/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
           return view('product.edit', compact('product', 'category'));
    }
    
    public function update($id)
    {
        // query ke database buat ambil product dari id=$id
        $product=product::find($id);

        //update
        $product->update([
            'category_id' => request('category_id'),
            'name'=> request('name'),
            'price'=> request('price'),
            ]);
        
        // redirect
        return redirect( '/product');
    }

    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect('/product');
    }
    
}   
