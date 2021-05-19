<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class PostCRUDController extends Controller
{

    public function create()
    {
        $id = Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('posts.create')->with('countAlert' ,$countAlert);
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
            'name' => 'required|min:3',
            'price' => 'required',
            'amount' => 'required',
            'date' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $path = $request->file('image')->store('public/images');
        $post = new Post;
        $post->name = $request->name;
        $post->price = $request->price;
        $post->amount = $request->amount;
        $post->date = $request->date;
        $post->detail = $request->detail;
        $post->image = $path;
        $post->user_id = Auth::user()->id;
        $post->user_name = Auth::user()->name;
        $post->save();    
        return redirect()->route('index')
                        ->with('success','Post has been created successfully.');
    }

    public function edit(Post $post)
    {
        $id = Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('posts.edit',compact('post'))->with('countAlert' ,$countAlert);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'detail' => 'required',
            'date' => 'required',
            // 'time' => 'required',
        ]);
        
        $post = Post::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $post->image = $path;
        }
        $post->name = $request->name;
        $post->price = $request->price;
        $post->amount = $request->amount;
        $post->detail = $request->detail;
        $post->date = $request->date;
        $post->save();
    
        return redirect()->route('page.showpost', ['id' => $post])
                        ->with('success','Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('index')
                        ->with('success','Post has been deleted successfully');
    }
}
