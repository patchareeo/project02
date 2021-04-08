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
        $Alerts = Alert::orderBy('id', 'DESC')->get();
        $id = Auth::user()->id;
        $Alerts = Alert::where('orders_id',$id)->get();
        $countAlert = Alert::where('orders_id',$id)->count();
        // $order = orders::where('orders_id',$id)->get();
        // dd($countAlert);
        

        // return view('page.alert', ['countAlert' => $countAlert])->with(compact('Alerts'));
        return view('page.alert')->with('countAlert' ,$countAlert)->with(compact('Alerts'));
        
    }

    public function status(Request $request,$id){
   
        // $updatestatus->status = $request->submit;
        // $updatestatus->post_id = $request->post_id;
        //  dd($request->submit);
        // $order = orders::findOr(); 
        // $orders = Alert::where('id',$id)->get();
        // $orders->post_id = $orders->post_id;
        
        
        $orders = DB::table('alerts','orders')->where('id', $id)->get();
        foreach ($orders as $order) {
            // $updatestatus = new Alert;
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
            // dd($updatestatus);
            $updatestatus->save();

            $updatestatus = orders::find($id);
            $updatestatus->id = $id;
            $updatestatus->post_id = $order->post_id;
            // $updatestatus->orders_id = $order->orders_id;
            $updatestatus->user_id = $order->user_id;
            $updatestatus->user_name = $order->user_name;
            $updatestatus->amount = $order->amount;
            $updatestatus->detail = $order->detail;
            $updatestatus->product_name = $order->product_name;
            $updatestatus->product_price = $order->product_price;
            $updatestatus->status = $request->submit;
            // dd($updatestatus);
            $updatestatus->save();
        }

        // $updatestatus->id = $id;
        // $updatestatus->post_id = $orders->post_id;
        // $updatestatus->orders_id = $orders->orders_id;
        // $updatestatus->user_id = $orders->user_id;
        // $updatestatus->user_name = $orders->user_name;
        // $updatestatus->amount = $orders->amount;
        // $updatestatus->detail = $orders->detail;
        // $updatestatus->product_name = $orders->product_name;
        // $updatestatus->product_price = $orders->product_price;
        // $updatestatus->status = $request->submit;

        return redirect()->route('page.alert',['id' => $orders])     //->compact('orders',$orders)
        ->with('success','Data Saved');
           
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
    //     $validator = Validator::make($request->all(), [
    //         'amount' => 'required',
    //         'detail' => 'required',
    //     ]);

    //     $productId = $request->id;
    //     $post = new Alert;
    //     $post->amount = $request->input('amount');
    //     $post->detail = $request->input('detail');
    //     $post->user_id = 1;
    //     $post->post_id = $productId;
    //     $post->orders_id = $productId;

    //     $post->save();
      
    //     return retdirect()->back();
        // return redirect()->route('page.alert')
        //                 ->with('success','Data Saved');
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
        
        // $Alerts = Alert::findOrFail($id);
        // return view('page.alert',compact('alert'));
        // dd($Alerts);
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
