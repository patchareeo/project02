<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Model\User;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth');
    // }
    
    public function index()
    {
       $posts = PostComment::all();
        //dd($posts);
       return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
        ]);

        if ($validator->fails()) {

            return redirect('post')
                        ->withErrors($validator)
                        ->withInput();
        }

        PostComment::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->title)
        ]);

        // return redirect()->back();
        return redirect()->route('post.index')
        ->with('success');

    }

    
     public function show(PostComment $post) {
    //  dd($post);
        return view('post.single',compact('post'));

    }
}
