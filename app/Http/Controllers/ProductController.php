<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  
        $product=Product::orderby('Productname','asc')->take(3)->get();
        return view('products.Product')->with('product',$product)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'Productname'=>'required',
           'Description'=>'required',
           'Categoryid'=>'required',
           'Quantity'=>'required',
           'Price'=>'required',

       ]);
       //create post
       $product=new Product;
       $product->Productname=$request->input('Productname');
       $product->Description=$request->input('Description');
       $product->Categoryid=$request->input('Categoryid');
       $product->Quantity=$request->input('Quantity');
       $product->Price=$request->input('Price');
       $product->save();
       return redirect('/Product')->with('success','Product updated');

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
      $product=Product::find($id);
      return view('products.edit')->with('product',$product);
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
        $this->validate($request,[
            'Productname'=>'required',
            'Description'=>'required',
            'Categoryid'=>'required',
            'Quantity'=>'required',
            'Price'=>'required',
 
        ]);
        //create post
        $product=Product::find($id);
        $product->Productname=$request->input('Productname');
        $product->Description=$request->input('Description');
        $product->Categoryid=$request->input('Categoryid');
        $product->Quantity=$request->input('Quantity');
        $product->Price=$request->input('Price');
        $product->save();
        return redirect('/Product')->with('success','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('/Product')->with('success','Product removed');
    }
}
