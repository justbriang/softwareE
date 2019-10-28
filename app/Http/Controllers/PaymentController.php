<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payments;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payments::orderby('Payment','asc')->take(5)->get();
        return view('payments.Payments')->with('payment',$payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request,[
                'Payment'=>'required',
    
    
            ]);
            //create post
            $payments=new Payments;
            $payments->Payment=$request->input('Payment');
            $payments->save();
            return redirect('/Payments')->with('success','Payment Type updated');
    
        }
    
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
        $payments=Payments::find($id);
        return view('payments.edit')->with('payments',$payments);
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
            'Payment'=>'required',
]);
        //create post
        $payments=Payments::find($id);
        $payments->Payment=$request->input('Payment');
        $payments->save();
        return redirect('Payments')->with('success','Payment Type updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payments=Payments::find($id);
        $payments->delete();
        return redirect('Payments')->with('success','Payment Type removed');
    }
}
