<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use Auth;
use App\Models\orders;
use Illuminate\Support\Facades\DB;

class AlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $Alerts = Alert::where('orders_id',$id)->orderBy('id', 'DESC')->get();
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('page.alert')->with('countAlert' ,$countAlert)->with(compact('Alerts'));
        
    }

    public function status(Request $request,$id){
        
        $orders = DB::table('alerts','orders')->where('id', $id)->get();
        foreach ($orders as $order) {
            $updatestatus = Alert::find($id);
            $updatestatus->id = $id;
            $updatestatus->post_id = $order->post_id;
            $updatestatus->orders_id = $order->orders_id;
            $updatestatus->user_id = $order->user_id;
            $updatestatus->user_name = $order->user_name;
            $updatestatus->amount = $order->amount;
            $updatestatus->detail = $order->detail;
            $updatestatus->product_name = $order->product_name;
            $updatestatus->product_price = $order->product_price;
            $updatestatus->status = $request->submit;
            $updatestatus->save();

            $orderstatus = orders::find($id);
            $orderstatus->id = $id;
            $orderstatus->post_id = $order->post_id;
            $orderstatus->user_id = $order->user_id;
            $orderstatus->user_name = $order->user_name;
            $orderstatus->amount = $order->amount;
            $orderstatus->detail = $order->detail;
            $orderstatus->product_name = $order->product_name;
            $orderstatus->product_price = $order->product_price;
            $orderstatus->status = $request->submit;
            $orderstatus->save();
        }
        return redirect()->route('page.alert',['id' => $orders])    
        ->with('success');
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Alerts = Alert::all();
        return view('page.alert')-> with(compact('Alerts'));
        
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
