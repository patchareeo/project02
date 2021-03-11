<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\orders;
use App\Models\Alert;
use App\Models\User;
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
        if (Auth::user()) {
            $id = Auth::user()->id;
            // $id = Auth::all('name','id');
            $posts = Post::orderBy('id', 'DESC')->get();
            $Alerts = Alert::orderBy('id', 'DESC')->get();
            $countAlert = Alert::where('orders_id',$id)->count();
            // $countAlert = Alert::all()->count();
            return view('page.home')->with(compact('posts'))->with('countAlert' ,$countAlert)->with(compact('Alerts'));
        } else {
            $posts = Post::orderBy('id', 'DESC')->get();
            return view('page.home')->with(compact('posts'));
        }
       

    }

    public function searchProduct(Request $request) {
        $name = "%" . $request->search . "%" ;
        $products = Post::where('name','LIKE', $name)->get();
        $id = Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();
        // dd($name);
        return view("page.search")->with('products',$products)->with('countAlert' ,$countAlert);
    }

    public function sale()
    {
        // $posts = Post::orderBy('id', 'DESC')->get();
        // $Sale = Post::orderBy('id', 'DESC')->get();
        $Alerts = Alert::orderBy('id', 'DESC')->get();
        $id = Auth::user()->id;
        $Sale = Post::where('user_id',$id)->get();
        // $countAlert = Alert::all()->count();
        $countAlert = Alert::where('orders_id',$id)->count();
       
        return view('page.sale')->with(compact('Sale'))->with('countAlert' ,$countAlert)->with(compact('Alerts'));

    }

    public function profile(Request $request)
    {
        $profile = new User;
        
        $profile->profile_name =Auth::user()->name;
        $profile->profile_email=Auth::user()->email;
        $profile->profile_phone =Auth::user()->phone;
        $id =Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();

        return view('page.profile')->with(compact('profile'))->with('countAlert' ,$countAlert);
    }

    public function contact($user_id)
    {
        $contact = User::find($user_id);
        // dd($contact);
        // dd($contact); 
        // $contact = new User;
        // dd($user_id);
        // $contact->contact_name = Auth::user()->name;
        // $contact->contact_email= Auth::user()->email;
        // $contact->contact_phone = Auth::user()->phone;
        $id =Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();

        return view('page.contact')->with(compact('contact'))->with('countAlert' ,$countAlert);
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
    public function store(Request $request, $id)
    {
        
        
        $orders = Post::where('id',$id)->get();
        // dd($orders);
        foreach ($orders as $order) {
            // $id = $order->id;
            // $user_id = $order->user_id;
            // $user_name = $order->user_name;
            // $name = $order->name;
            // $price = $order->price;
            // $detail = $order->detail;
            // $status = $order->status;
            // $date = $order->date;
            // $slug = $order->slug;
            $id = $order->id;
            $user_id = $order->user_id;
            $user_name = $order->user_name;
            $name = $order->name;
            $price = $order->price;
            $image = $order->image;
            $amount = $order->amount;
            $time = $order->time;
        }
        // dd($id, $user_name, $name);
        

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'detail' => 'required',
        ]);

        $productId = $request->id;
        $post = new orders;
        $post->amount = $request->input('amount');
        $post->detail = $request->input('detail');
        $post->user_id = Auth::user()->id;
        $post->post_id = $productId;
        $post->user_name = Auth::user()->name;
        $post->product_name = $name;
        $post->product_price = $price;
        $post->product_image = $image;
        // $post->product_slug = $slug;
        // $post->product_date = $date;
        // $post->status->$status;
        // $post->time = $time;
        $post->save();

            // Alert 
        $productId = $request->id;
        $alert = new Alert;
        $alert->amount = $request->input('amount');
        $alert->detail = $request->input('detail');
        $alert->user_id = Auth::user()->id;
        $alert->post_id = $productId;
        $alert->orders_id = $user_id;
        $alert->user_name = Auth::user()->name;
        $alert->product_name = $name;
        $alert->product_price = $price;
        // $alert->product_slug = $slug;
        // $alert->product_image = $image;
        // $alert->product_date = $date;
        // $alert->time = $time;
        $alert->save();

        // dd($alert);
      
        // return retdirect()->back();
        return redirect()->route('page.showpost', $productId)
                        ->with('success','Data Saved');
    }

    public function cart()
    {

        // $buy = orders::orderBy('id', 'DESC')->get();
        $id = Auth::user()->id;
        $cart = orders::where('user_id',$id)->orderBy('id', 'DESC')->get();
        $countAlert = Alert::where('orders_id',$id)->count();

        return view('page.cart')->with(compact('cart'))->with('countAlert' ,$countAlert);
    }

    public function status(Request $request){

        // dd($request);
        // $order = orders::orderBy('id', 'DESC')->get();

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
        // $id = Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('page.showpost')->with(compact('details'))->with(compact('orders'))->with('countAlert' ,$countAlert);
        
        // dd($ordersUser); 
        // $post = Post::find($id);
        // $dateNow = (int)date("Y-m-d h:i");
        // $datePost = (int)($post->date . ' ' . $post->time);
        // dd($dateNow, $datePost);
        // dd(date("Y-m-d h:i"), $post->date , $post->time);
        // dd($details);      
        // dd(date("Y-m-d h:i"), $post->date . ' ' . $post->time);
        

        
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
    public function destroy(Request $request, $id)
    {
        $Alerts = Alert::where('id',$id);
        $Alerts ->delete();
        $order = orders::findOrFail($id);
        $order->delete();
          
        // $user = User::findOrFail($id);
        // $user->delete();

        // $post = Post::find($id);
        // dd(date("Y-m-d h:i"), $post->date . ' ' . $post->time);
        // dd($order);
        return redirect()->back();
    }
}
