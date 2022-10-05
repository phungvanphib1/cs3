<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::search()->paginate(4);
        $param = [
            'products' => $products,
        ];
        return view('admin.product.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|min:6',
            'quantity' => 'required',
            'type' => 'required',
            'price' => 'required',
            'mota' => 'required',
            'inputFile' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->type = $request->type;
        $product->mota = $request->mota;
        $product->price = $request->price;
        $file = $request->inputFile;

        if ($request->hasFile('inputFile')) {
            $fileExtension = $file->getClientOriginalName();
            //Lưu file vào thư mục storage/app/public/image với tên mới
            $request->file('inputFile')->storeAs('public/images', $fileExtension);
            // Gán trường image của đối tượng task với tên mới
            $product->image = $fileExtension;
        }
        // $product->image = $request->image;
        $product->save();

        $notification = [
            'message' => 'Added successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'quantity' => 'required',
            'type' => 'required',
            'mota' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->type = $request->type;
        $product->mota = $request->mota;
        $product->price = $request->price;
        $product->image = $request->image;
        $product->save();
        $notification = [
            'message' => 'Edited successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function display()
    {
        $products = Product::get();
        $param = [
            'products' => $products,
        ];
        return view('admin.product.display', $param);
    }
}
