<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\orders;
use App\Models\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;

 
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
            $posts = Post::where('date','>=',Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->paginate(12);
            $Alerts = Alert::orderBy('id', 'DESC')->get();
            $countAlert = Alert::where('orders_id',$id)->count();
            // $countAlert = Alert::all()->count();
            return view('page.home')->with(compact('posts'))->with('countAlert' ,$countAlert)->with(compact('Alerts'));
        } else {
            $posts = Post::where('date','>=',Carbon::now()->format('Y-m-d'))->orderBy('id', 'DESC')->paginate(12);
            return view('page.home')->with(compact('posts'));
            
        }
    }

    public function searchProduct(Request $request) {
        if (Auth::user()) {
            $name = "%" . $request->search . "%" ;
            $products = Post::where([['name','LIKE', $name], ['date','>=',Carbon::now()->format('Y-m-d')]])->get();
            // $products = Post::where('name','LIKE', $name,)->get();
            $id = Auth::user()->id;
            $countAlert = Alert::where('orders_id',$id)->count();
            // dd($products); 
            
            return view("page.search")->with('products',$products)->with('countAlert' ,$countAlert ,$id);
        } else {
            $name = "%" . $request->search . "%" ;
            $products = Post::where([['name','LIKE', $name], ['date','>=',Carbon::now()->format('Y-m-d')]])->get();
            return view("page.search")->with('products',$products);
        }
    
    }

    public function sale()
    {
        $id = Auth::user()->id;
        $Sale = Post::where('user_id',$id)->orderBy('id', 'DESC')->paginate(12);
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('page.sale')->with(compact('Sale'))->with('countAlert' ,$countAlert);
    }

    public function profile()
    {
        $profile = new User;
        
        $profile->profile_name =Auth::user()->name;
        $profile->profile_email=Auth::user()->email;
        $profile->profile_phone =Auth::user()->phone;
        $profile->image = Auth::user()->image;
        $id =Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();

        return view('page.profile')->with(compact('profile'))->with('countAlert' ,$countAlert);
    }
    public function editprofile($id)
    {
        // $id = Auth::user()->id;
        $countAlert = Alert::where('orders_id',$id)->count();
        $profile = User::find($id);
        // dd($profile);

        return view('page.edit-profile')->with('countAlert' ,$countAlert)->with(compact('profile'));
    }

    public function updateprofile(Request $request, $id)
    {
        // $request->validate([
            //     'name' => 'required',
            //     'email' => 'required',
            //     'phone' => 'required',
            //     ]);
            
            
            $profile = User::find($id);
            if($request->hasFile('image')){
                $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    ]);
                    $path = $request->file('image')->store('public/images');
                    $profile->image = $path;
                }
                $profile->name = $request->name;
                $profile->email = $request->email;
                $profile->phone = $request->phone;
                // $profile->email_verified_at = $request->email_verified_at ;
                // $profile->password = $request->password;
                // $profile->two_factor_secret = $request->two_factor_secret;
                // $profile->two_factor_recovery_codes = $request->two_factor_recovery_codes;
                // $profile->remember_token = $request->remember_token;
                // $profile->current_team_id = $request->current_team_id;
                // $profile->profile_photo_path = $request->profile_photo_path;
                // $profile->created_at = $request->created_at;
                // $profile->updated_at = $request->updated_at;
                // dd($profile);
                $profile->save();

        
    
        return redirect()->route('page.profile', ['id' => $profile])
                        ->with('success','Post updated successfully');
    }

    public function contact($user_id)
    {
        $contact = User::find($user_id);
        $id = Auth::user()->id;
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
           
            $id = $order->id;
            $user_id = $order->user_id;
            $user_name = $order->user_name;
            $name = $order->name;
            $price = $order->price;
            $image = $order->image;
            $amount = $order->amount;
            $time = $order->time;
            $status = $order->status;
        }
        // dd($id, $user_name, $name);
        

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'detail' => 'required',
            'status' => 'required',
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
        $post->status = 'รอการยืนยัน';
        
        // $post->product_slug = $slug;
        // $post->product_date = $date;
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
        $alert->status = 'รอการยืนยัน';
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
        $id = Auth::user()->id;
        $cart = orders::where('user_id',$id)->orderBy('id', 'DESC')->get();
        $countAlert = Alert::where('orders_id',$id)->count();
        return view('page.cart')->with(compact('cart'))->with('countAlert' ,$countAlert);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if(Auth::user()) {
            $details = Post::findOrFail($id);
            // $orders = orders::all();
            $orders = orders::where('post_id',$id)->get();
            $id = Auth::user()->id;
            $countAlert = Alert::where('orders_id',$id)->count();
            return view('page.showpost')->with(compact('details'))->with(compact('orders'))->with('countAlert' ,$countAlert);
        }else{
            $details = Post::findOrFail($id);
            // $orders = orders::all();
            $orders = orders::where('post_id',$id)->get();
            // $id = Auth::user()->id;
            // $countAlert = Alert::where('orders_id',$id)->count();
            return view('page.showpost')->with(compact('details'))->with(compact('orders'));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Alerts = Alert::where('id',$id);
        $Alerts ->delete();
        $order = orders::findOrFail($id);
        $order->delete();
     
        return redirect()->back();
    }

    public function deleteuser($id){
      
        DB::table('posts')->where('user_id', $id)->delete();  
        
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('index')
        ->with('success','Post has been deleted successfully');
    }
}
