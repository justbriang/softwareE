<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Purchases;
use DB;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchases::orderby('updated_at','asc')->take(10)->get();
        $product = Product::pluck('Productname', 'id');
       // $purchases=Purchases::find($id);
        return view('purchases.Purchases',compact('purchases','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $product = Product::pluck('Productname', 'id','category_id');
        return view('purchases.create', compact('product'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'product_id'=>'required',
            'quantity'=>'required',

        ]);
        //create sale
        $purchases=new Purchases();
        $purchases->id=$request->input('id');
        $purchases->product_id=$request->input('product_id');
        $purchases->quantity=$request->input('quantity');
        DB::table('products')->whereId($purchases->product_id)->increment('Quantity',$purchases->quantity)

        ;
        $purchases->save();
        return redirect('/Purchases')->with('success', 'Purchases updated!');

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
        $purchases=Purchases::find($id);
        $product = Product::pluck('Productname', 'id');
        return view('purchases.edit', compact('product','purchases'));
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
        //
        $this->validate($request,[
            'product_id'=>'required',
            'quantity'=>'required',

        ]);
        //create sale
        $purchases=Purchases::find($id);
        $purchases->id=$request->input('id');
        $purchases->product_id=$request->input('product_id');
        $purchases->quantity=$request->input('quantity');
        DB::table('products')->whereId($purchases->product_id)->increment('Quantity',$purchases->quantity)

        ;
        $purchases->save();
        return redirect('/Purchases')->with('success', 'Purchases updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchases=Purchases::find($id);
        $purchases->delete();
        return redirect('/Purchases')->with('success', 'purchase removed');
    }
}
