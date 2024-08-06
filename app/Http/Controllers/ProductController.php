<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $products = Product::all();
        return view('products.index',compact('products','sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'name'          => 'required|max:255',
            'section_id'    => 'required'
        ],[
            'name.required' =>'يرجي ادخال اسم المنتج',
            'section_id.required'   => 'اسم القسم مطلوب'
        ]);
        Product::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'section_id'    => $request->section_id
        ]);
        session()->flash('success', 'تم اضافة المنتج بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [

            'name'          => 'required|max:255',
        ],[
            'name.required' =>'يرجي ادخال اسم المنتج',
        ]);
        $product->update([
            'name'          => $request->name,
            'description'   => $request->description
        ]);
        session()->flash('success', 'تم تعديل المنتج بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'تم حذف المنتج بنجاح');
        return redirect()->back();
    }
}
