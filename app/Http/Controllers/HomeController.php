<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product=Product::orderby('Productname','asc')->take(3)->get();
        $categories = Category::pluck('Categoryname', 'id');
        $visitor = DB::table('products')
            ->select(
                DB::raw("(Productname) as prod"),
                DB::raw("SUM(Quantity) as qty"))
            ->groupBy(DB::raw("Productname"))->get();



        $result[] = ['Productname','Quantity'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->prod, (int)$value->qty];
        }



        return view('home',compact('product','categories')) ->with('visitor',json_encode($result));

    }
}
