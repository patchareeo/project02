<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\orders;
use App\Models\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;

 
class HomeCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $posts = Post::orderBy('id', 'DESC')->get();
        $Alerts = Alert::orderBy('id', 'DESC')->get();
        $countAlert = Alert::all()->count();
        return view('page.home')->with(compact('posts'))->with('countAlert' ,$countAlert)->with(compact('Alerts'));
        // return view('page.showpost')-> with(compact('details'))->with(compact('orders'));

    }

    public function sale()
    {
        // $posts = Post::orderBy('id', 'DESC')->get();
        // $Sale = Post::orderBy('id', 'DESC')->get();
        $Alerts = Alert::orderBy('id', 'DESC')->get();
        $id = Auth::user()->id;
        $Sale = Post::where('user_id',$id)->get();
        $countAlert = Alert::all()->count();
       
        return view('page.sale')->with(compact('Sale'))->with('countAlert' ,$countAlert)->with(compact('Alerts'));

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
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'detail' => 'required',
        ]);

        $productId = $request->id;
        $post = new orders;
        $post->amount = $request->input('amount');
        $post->detail = $request->input('detail');
        $post->user_id = 1;
        $post->post_id = $productId;
        // $post->user_name = $productId;

        $post->save();

        $productId = $request->id;
        $alert = new Alert;
        $alert->amount = $request->input('amount');
        $alert->detail = $request->input('detail');
        $alert->user_id = 1;
        $alert->post_id = $productId;
        $alert->orders_id = $productId;
        $alert->user_name = $productId;

        $alert->save();
      
        // return retdirect()->back();
        return redirect()->route('page.showpost', $productId)
                        ->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $details = Post::findOrFail($id);
        // $orders = orders::all();
        $orders = orders::where('post_id',$id)->get();
        $countAlert = Alert::all()->count();
        // dd($ordersUser);

        
        // $post = Post::find($id);
        // $dateNow = (int)date("Y-m-d h:i");
        // $datePost = (int)($post->date . ' ' . $post->time);
        // dd($dateNow, $datePost);
        // dd(date("Y-m-d h:i"), $post->date , $post->time);
        // dd($details);
        
        // dd(date("Y-m-d h:i"), $post->date . ' ' . $post->time);
        return view('page.showpost')->with(compact('details'))->with(compact('orders'))->with('countAlert' ,$countAlert);
        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return view('posts.edit',compact('post'));
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
        $post->delete();
        $post = Post::find($id);
        dd(date("Y-m-d h:i"), $post->date . ' ' . $post->time);
    }
}
