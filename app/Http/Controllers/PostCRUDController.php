<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($posts);
        $data['posts'] = Post::orderBy('id','desc')->paginate(5);
    
        return view('posts.index', $data);
        // $posts=Post::orderBy('id', 'desc')->get();
        // $posts = Post::all();
        // echo $posts;
        // return view('page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'time' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $path = $request->file('image')->store('public/images');
        // Post::create([
        //     'name' => $request->name,
        //     'slug' => \Str::slug($request->name),
        //     'price' => $request->price,
        //     'amount' => $request->amount,
        //     'image' => $request->$path,
        //     'detail' => $request->detail,
        // ]);

        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'amount' => 'required',
        //     'image' => 'requi  $path = $request->file('image')->store('public/images');
        //     'detail' => 'required',
        // ]);
        $post = new Post;
        $post->name = $request->name;
        $post->slug = \Str::slug($request->name);
        $post->price = $request->price;
        $post->amount = $request->amount;
        $post->date = $request->date;
        $post->time = $request->time;
        $post->detail = $request->detail;
        $post->image = $path;
        $post->save();
      
        
        return redirect()->route('index')
                        ->with('success','Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        return view('page.showpost',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'detail' => 'required',
            'date' => 'required',
            'time' => 'required',
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
        $post->time = $request->time;
        $post->save();
    
        return redirect()->route('index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post has been deleted successfully');
    }
}
