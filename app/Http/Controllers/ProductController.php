<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
            $product = product::paginate(5);
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
            'filename'=> request('filename'),
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

    public function export()
    {
        Excel::create('product', function($excel) {
            // query untuk ambil data dari database

            $excel->sheet('sheet', function($sheet) {
                $product=Product::all();
                $sheet->loadView('excel.product', compact('product'));
            });
        })->download('xls');

        }

        public function import()
        {
            $file = request()->file('file');
            Excel::load($file, function ($reader) {
                $result = $reader->get();

                foreach ($result as $result) {
                    Product::create([
                    'category_id' => $result->kategori,
                    'name' => $result->name,
                    'price' => $result->price,
                ]);
                }
            });

            return redirect()->route('product.index');
            }
}
