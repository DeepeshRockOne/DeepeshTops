<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\categorie;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorie::all();
        return view('admin.add_product', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('admin/upload/products/', $image_name);
            $data->image = $image_name;
        }
        $data->cate_id = $request->category_id;
        $data->save();
        
        return redirect('manage_product')->with('product_added_success', 'Product added successfully.');
    }

    public function manageProduct()
    {
        $data = product::join('categories', 'products.cate_id', '=', 'categories.id')->get(['products.*', 'categories.name as cate_name']);
        return view('admin.manage_product', ['data'=>$data]);
    }

    public function editProduct(product $product, $editid)
    {
        $data = product::find($editid);
        $categories = categorie::all();

        return view('admin.edit_product', ['data'=>$data, 'categories'=>$categories]);
    }

    public function updateProduct(Request $request, $editid)
    {
        $data = product::find($editid);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;

        if ($request->hasFile('image')) {
            $old_image = $data->image;
            $image = $request->image;
            $image_name = time() . "_img." . $image->getClientOriginalExtension();
            $image->move('admin/upload/products/', $image_name);
            $data->image = $image_name;

            if (file_exists('admin/upload/products/'.$old_image)) {
                unlink('admin/upload/products/'.$old_image);
            }
        }

        $data->cate_id = $request->category_id;
        $data->save();

        return redirect('manage_product')->with('product_update_success', 'Product updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    public function showProducts(product $product)
    {
        $data = product::all();

        return view('website.menu', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product, $delid)
    {
        $data = product::find($delid);
        $data->delete();
        $old_image = $data->image;

        if(file_exists('admin/upload/products/'.$old_image)) {
            unlink('admin/upload/products/'.$old_image);
        }

        return redirect('manage_product')->with('product_deleted_success', 'Product deleted successfully.');
    }
}
