<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\orders;
use Illuminate\Support\Facades\Validator;
 
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
        return view('page.home', compact('posts'));
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

        $post->save();
      
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
        $orders = orders::all();
        // dd($orders);

        
        // $post = Post::find($id);
        // $dateNow = (int)date("Y-m-d h:i");
        // $datePost = (int)($post->date . ' ' . $post->time);
        // dd($dateNow, $datePost);
        // dd(date("Y-m-d h:i"), $post->date , $post->time);
        // dd($details);
        
        // dd(date("Y-m-d h:i"), $post->date . ' ' . $post->time);
        return view('page.showpost')-> with(compact('details'))->with(compact('orders'));
        

        
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
