<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;
use Khill\Lavacharts\Lavacharts; //subject to being removed




class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sales::orderby('updated_at','asc')->take(1)->get();
        return view('sales')->with('sales',$sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sales.create');
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
            'category_id'=>'required',
            'quantity'=>'required',
            'salesType'=>'required',

        ]);
        //create sale
        $sale=new Sales;
        $sale->id=$request->input('id');
        $sale->productid=$request->input('productid');
        $sale->category_id=$request->input('category_id');
        $sale->quantity=$request->input('quantity');
        $sale->salesType=$request->input('salesType');
        $sale->save();
        return redirect('/Sales')->with('success', 'Sales updated!');

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
        //
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
        $this->validate($request, [
            'product_id'=>'required',
            'category_id'=>'required',
            'quantity'=>'required',
            'salesType'=>'required',
        ]);
        //create sale
        $sale=new Sales;
        $sale->id=$request->input('id');
        $sale->productid=$request->input('productid');
        $sale->category_id=$request->input('category_id');
        $sale->quantity=$request->input('quantity');
        $sale->salesType=$request->input('salesType');
        $sale->save();
        return redirect('/Sales')->with('success', 'Sales updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale=Sales::find($id);
        $sale->delete();
        return redirect('/Sales')->with('success', 'Sale removed');
    }
}
