<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { $categories = Category::pluck('Categoryname', 'id');
        $product=Product::orderby('Productname','asc')->take(10)->get();
        $visitor = DB::table('products')
            ->select(
                DB::raw("(Productname) as prod"),
                DB::raw("SUM(Quantity) as qty"))
            ->groupBy(DB::raw("Productname"))->get();



        $result[] = ['Productname','Quantity'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->prod, (int)$value->qty];
        }

        return view('products.Product',compact('product','categories'))->with('visitor',json_encode($result));
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('Categoryname', 'id');
        return view('products.create', compact('categories'));
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
           'category_id'=>'required',
           'Quantity'=>'required',
           'Price'=>'required',

       ]);
       //create post
       $product=new Product;
       $product->Productname=$request->input('Productname');
       $product->Description=$request->input('Description');
       $product->category_id=$request->input('category_id');
       $product->Quantity=$request->input('Quantity');
       $product->Price=$request->input('Price');
       $product->save();
       return redirect('/Product')->with('success','Product updated!');

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
      $categories=Category::pluck('Categoryname','id');
      return view('products.edit',compact(['product','categories']));
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
            'category_id'=>'required',
            'Quantity'=>'required',
            'Price'=>'required',

        ]);
        //create post
        $product=Product::find($id);
        $product->Productname=$request->input('Productname');
        $product->Description=$request->input('Description');
        $product->category_id=$request->input('category_id');
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
