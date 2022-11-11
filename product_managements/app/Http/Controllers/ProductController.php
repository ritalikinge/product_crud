<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aData = array();
        $aData['All_Products'] = ProductModel::all();
        return view('product.list', $aData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'product_name' => 'required',
            'image' => 'required',
        ]);

        if($request->image) { 
            $destination_path = public_path().'/uploads/images/';
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();   
            $filename = time().'.'.$extenstion;  
            $input['image'] = $filename;                 
            $file->move($destination_path, $filename);            
        }  

        $product = new ProductModel();
        $product->product_name = $input['product_name'];
        $product->image = $input['image'];
        $product->created_at = strtotime("now");
        $product->updated_at = 0;
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product Added Successfully'); 
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
        $aData = array();   
        $aData['aProducts'] = ProductModel::find($id); 
        return view('product.edit', $aData);
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
        $input = $request->all();
        $this->validate($request,[
            'product_name' => 'required'
        ]);

        if($request->image){ 
            $destination_path = public_path().'/uploads/images/';
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();   
            $filename = time().'.'.$extenstion;  
            $input['image'] = $filename;                 
            $file->move($destination_path, $filename);            
        }  

        $product = ProductModel::findOrFail($id);
        $product->product_name = $input['product_name'];
        if($request->image){ 
            $product->image = $input['image'];
        }
        $product->updated_at = strtotime("now");
        $product->save();
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully'); 
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductModel::where('id',$id)->delete();
        return back()->with('error', 'Product deleted successfully');
    }
}
