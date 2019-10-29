<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Sales;
use App\Category;
use App\Payments;
use DB;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $product = Product::pluck('Productname', 'id');
        $payment= Payments::pluck('Payment','id');
        $sales=Sales::orderby('updated_at','asc')->take(10)->get();
        $visitor = DB::table('sales')
            ->select(
                DB::raw("(product_id) as prod"),
                DB::raw("SUM(quantity) as qty"))
            ->groupBy(DB::raw("product_id"))->get();



        $result[] = ['Product_id','quantity'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [(int)$value->prod, (int)$value->qty];
        }

        return view('sales.Sales',compact('product','payment','sales'))->with('visitor',json_encode($result));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $product = Product::pluck('Productname', 'id');
        $payment = Payments::pluck('Payment', 'id');
        return view('sales.create', compact('product','payment'));
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
            'payment'=>'required',

        ]);
        //create sale
        $sales=new Sales;
        $sales->id=$request->input('id');
        $sales->product_id=$request->input('product_id');
        $sales->quantity=$request->input('quantity');
        $sales->Payment=$request->input('payment');
        DB::table('products')->whereId($sales->product_id)->decrement('Quantity',$sales->quantity)
        ;
        $sales->save();
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
        $sales=Sales::find($id);
        $product = Product::pluck('Productname', 'id');
        $payment = Payments::pluck('Payment'); 
        return view('sales.edit', compact('sales','product','payment'));
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
            'product_id'=>'required',
            'quantity'=>'required',
            'payment'=>'required',

        ]);
        //create sale
        $sales=Sales::find($id);
        $sales->id=$request->input('id');
        $sales->product_id=$request->input('product_id');
        $sales->quantity=$request->input('quantity');
        $sales->Payment=$request->input('payment');
        DB::table('products')->whereId($sales->product_id)->decrement('Quantity',$sales->quantity)
        ;
        $sales->save();
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
