<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use PHPUnit\Framework\Reorderable;
// use Session;
use Stripe;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\BusinessUser;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::paginate(6);
        // $comments = Comment::all();
        $replys = Reply::all();
        // $comments = Comment::with('replies')->get();
        // return view('home.userpage', compact('product', 'comments'));
        $comments = Comment::with('replies.user')->get();
        return view('home.userpage', compact('product', 'comments'));

        // return view('home.userpage' , compact('product' , 'comments'  , 'replys'));
      
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();
            $order = Order::all();
            $total_revenue = 0;
            $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();
            foreach ($order as $order) {
                $total_revenue += $order->price;
            }
            return view('admin.home', compact('total_product', 'total_user', 'order', 'total_revenue', 'total_order', 'total_delivered', 'total_processing'));
        }
        else if($usertype == '2'){
            return view('superadmin.home');
        }
         else {
            $user = Auth::user(); 
            $product = Product::paginate(6);
            // $comments = Comment::all();
            $replys = Reply::all();
            // $comments = Comment::with('replies')->get();
            // return view('home.userpage', ['product' => $product, 'comments' => $comments]);
            $comments = Comment::with('replies.user')->get();
            
        // Update cart count in session
        $cart_count = Cart::where('user_id', $user->id)->count();
        session(['cart_count' => $cart_count]);
            return view('home.userpage', ['product' => $product, 'comments' => $comments]);
            // return view('home.userpage', ['product' => $product, 'comments' => $comments , 'replys'=>$replys]);
        }
    }
    public function product_detail($id)
    {
        $product = product::find($id);
        return view('home.product_detail' , compact('product'));
    }
    public function add_cart (Request $request,$id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id; 
            $cart->product_title = $product->title;
            if($product->discount_price != null)
            {
                $cart->price = $product->discount_price*$request->quantity;
            }
            else 
            {
                $cart->price = $product->price*$request->quantity;
            }
            $cart->image = $product->image;
            $cart->quantity = $request->quantity;
            $cart->save();
            // Update cart count in session
            $cart_count = Cart::where('user_id', $user->id)->count();
            session(['cart_count' => $cart_count]);
            return redirect()->back();
            // return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if(Auth::check()){
            $id=Auth::user()->id;
            $cart = cart::where('user_id','=',$id)->get();
            return view('home.show_cart' , compact('cart'));
        }
        else 
        {
            return redirect('login');
        }
    }
    public function delete_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
         // Update cart count in session
    $user = Auth::user();
    $cart_count = Cart::where('user_id', $user->id)->count();
    session(['cart_count' => $cart_count]);
        return redirect()->back();
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id','=', $userid)->get();
        foreach($data as $data)
        {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message' , 'We have received your order, so we will contact to you soon.');
    }
    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }
    public function stripePost(Request $request , $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment" 
        ]);
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id','=', $userid)->get();
        foreach($data as $data)
        {
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $order = order::where('user_id' , '=' , $userid)->get();
            return view('home.order' , compact('order'));
        }
        else 
        {
            return redirect('login');
        }
    } 
    public function cancel_order($id)
    {
        $order = order::find($id);
        $order->delivery_status = 'You canceled this product';
        $order->save();
        return redirect()->back()->with('message' , 'Product has canceled successfully');
    }
   
    public function add_comment(Request $request)
{
    if (Auth::id()) {
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->back();
    } else {
        return redirect('login');
    }
}
    
public function add_reply(Request $request) {
    if(Auth::id()) {
        $reply = new Reply(); 
        $reply->name = Auth::user()->name;
        $reply->user_id = Auth::user()->id;
        $reply->comment_id = $request->commentId; 
        $reply->reply = $request->reply; 
        $reply->save();
        return redirect()->back();
    } else {
        return redirect('login');
    }
}
// public function search(Request $request)
// {   
//     if(Auth::id()){
//         $query = $request->input('query');
//         $product = Product::where('title', 'LIKE', "%{$query}%")
//                             ->orWhere('description', 'LIKE', "%{$query}%")
//                             ->paginate(10);
    
//         return view('home.userpage', ['product'=>$product , 'query'=>$query]);
//     }
//     else
//     {
//         return redirect('login');
//     }
// }
public function search(Request $request)
{   
    if(Auth::id()){
        $query = $request->input('query');
        $product = Product::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->paginate(10);
        $comments = Comment::with('replies.user')->get(); // Add this line
    
        return view('home.userpage', ['product' => $product, 'query' => $query, 'comments' => $comments]); // Include $comments in the view data
    }
    else
    {
        return redirect('login');
    }
}
    public function contact_template()
    {
        return view('home.contact_template');
    }
    public function blog_template()
    {
        return view('home.blog_template');
    }
    public function about_template()
    {
        return view('home.about_template');
    }
    public function testmonial_template()
    {
        return view('home.testmonial_template');
    }
    public function showallproduct()
    {
        $products = Product::all();  // Fetch all products from the database
        return view('home.showallproduct' , compact('products'));
    }
    public function qrcodeforpaying()
    {
        return view('home.qrcodeforpaying');
    }
    public function computer()
    {
        // $computer = Product::where('category','Computer')->paginate(6);
        $computers = Product::where('title', 'LIKE', '%Computer%')
        ->orWhere('title', 'LIKE', '%Mac%')
        ->orWhere('description', 'LIKE', '%Computer%')
        ->orWhere('description', 'LIKE', '%Mac%')
        ->paginate(6);
        return view('home.computer' , compact('computers'));
    }
    public function phone()
    {
         $phones = Product::where('title', 'LIKE', '%Phone%')
         ->orWhere('title', 'LIKE', '%iPhone%')
         ->orWhere('description', 'LIKE', '%Phone%')
         ->orWhere('description', 'LIKE', '%iPhone%')
         ->paginate(6);
        return view('home.phone' , compact('phones'));
    }
    public function airpod()
    {
        $airpods= Product::where('title', 'LIKE', '%AirPod%')
        ->orWhere('title', 'LIKE', '%AirPod%')
        ->orWhere('description', 'LIKE', '%AirPod%')
        ->orWhere('description', 'LIKE', '%AirPod%')
        ->paginate(6);
        return view('home.airpod' , compact('airpods'));
    }
    public function register(Request $request)
    {
        try {
            // Validate user input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:255',
            ]);

            // Create user with explicit usertype
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'usertype' => '0',  // Explicitly set usertype
            ]);

            // Log success
            \Log::info('User created successfully', ['user_id' => $user->id]);

            return redirect()->route('login')
                ->with('success', 'Registration successful! Please login.');

        } catch (\Exception $e) {
            // Log the error
            \Log::error('Registration error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return back()
                ->withErrors(['error' => 'Registration failed: ' . $e->getMessage()])
                ->withInput();
        }
    }
}

