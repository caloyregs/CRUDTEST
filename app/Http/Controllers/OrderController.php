<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Redirect,Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::with(['customer', 'product'])
                ->orderBy('id', 'DESC')
                ->get();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('orders.create' ,compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $rdata = [
            'customer_id'=> $request->cust_id,
            'product_id' => $request->product,
            'qty'        => $request->qty,
            'total'      => $request->total
        ];

        $r = new Order();
        $r->fill($rdata);
        $r->save();

        //return response()->json(['success' => "New Order was Added!"]);
        return redirect()->route('orders.index')->with('info', '"New Order was created.');

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
        $products = Product::all();

        $where = array('id' => $id);
        $order = Order ::where($where)->first();

        return view('orders.update' ,compact('products', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Order::where('id', '=', $request->order_id)
            ->update([
                'product_id' => $request->product2,
                'qty'=> $request->qty2,
                'total' => $request->total2
            ]);

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        /*
        //$id     = $request->id;
        $order  = Order::where('id',$id)->delete();
        return redirect()->route('orders'); //->with('info', '"New Order was created.');
        //return Response::json($order);
        */

        $order = Order::where('id',$id)->delete();
        return redirect()->route('orders.index');
        //return Response::json($order);
    }

    public function product_info(Request $request) {

        $id = $request->product_id;
        $product = Product::where('id',$id)->first();

        $data = ['success' => true,
            'data' => $product,
            'message' => 'product',];

        return response()->json($data);

    }

}
