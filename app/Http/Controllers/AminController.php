<?php

namespace App\Http\Controllers;
use App\Models\UserActivity;
use App\Models\Category;
use Illuminate\Http\Request ;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Notifications\Notification;
use Notification;
use App\Notifications\SendNotification;
use PhpParser\Node\Expr\FuncCall;

class AminController extends Controller
{
  
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
      $data = new category;
      $data->category_name=$request->category;
      $data->save();
      return redirect()->back()->with('message','Category Added Successfully');
    }
    public function delete_category($id)
    {
      $data = category::find($id);
      $data->delete();
      return redirect()->back()->with('message','Category Deleted Successfully');
    }
    public function view_product()
    {
      $category =category::all();
      return view('admin.product' , compact('category'));
    }
    public function add_product(Request $request)
    {
      $product = new product;
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->discount_price = $request->discount_price;
      $product->category = $request->category;
      $image= $request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product' , $imagename);
      $product->image = $imagename;
      $product->save();
      return redirect()->back()->with('message','Product Added Successfully');
    }
    public function show_product(Request $request)
    {
      $product = product::all();
      return view('admin.show_product' , compact('product'));
    }
    public function delete_product($id)
    {
      $product = product::find($id);
      $product->delete();
      return redirect()->back()->with('message','Product Deleted Successfully');
    }
    public function update_product($id)
    {
      $product = product::find($id);
      $category = category::all();
      return view('admin.update_product' , compact('product' ,'category'));
    }
    public function update_product_confirm(Request $request , $id)
    {
      $product = product::find($id);
      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->discount_price = $request->discount_price;
      $product->category = $request->category;
      $image = $request->image;
      if($image)
      {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product' , $imagename);
        $product->image = $imagename;
      }
      $product->save();
      return redirect()->back()->with('message','Product updated successfully');
    }
    public function order()
    {
      $order =  order::all();
      return view('admin.order' , compact('order'));
    }
    public function delivery($id)
    {
      $order = order::find($id);
      $order->delivery_status = 'delivered';
      $order->payment_status = 'Paid';
      $order->save();
      return redirect()->back();
    }
    // public function print_pdf($id)
    // {
    //   $order = order::find($id);
    //   $pdf = Pdf::loadView('admin.pdf' , compact('order'));
    //   return $pdf->download('order_details.pdf');
    // }
    public function print_pdf($id)
{
    $order = Order::find($id);

    if (!$order) {
        return redirect()->back()->with('error', 'Order not found.');
    }

    $pdf = Pdf::loadView('admin.pdf', compact('order'));
    return $pdf->download('order_details.pdf');
}
  public function send_email($id)
  {
    $order = order::find($id);
    return view('admin.send_email' , compact('order'));
  }
  public function send_email_notification(Request $request ,$id)
  {
    $order = order::find($id);
    $details = [
      'greeting' => $request->greeting,
      'firstline' => $request->firstline,
      'body' => $request->body,
      'button' => $request->button,
      'url' => $request->url,
      'lastline' => $request->lastline,
    ];
    Notification::send($order, new SendNotification($details)); // 
    // $order->user->notify(new SendNotification($details));
    return redirect()->back()->with('message','Email has sent successfully');
  }
  public function searchData(Request $request)
  {
    $searchTextData = $request->search;
    $order = order::where('name' , 'LIKE' , "%{$searchTextData}%")->orWhere('product_title', 'LIKE' , "%{$searchTextData}%")
    ->orWhere('address', 'LIKE' , "%{$searchTextData}%")->orWhere('phone', 'LIKE' , "%{$searchTextData}%")
    ->get();
    return view('admin.order', compact('order'));
  }
  public function popular_product()
  {
   // Fetch products ordered by the number of times they have been ordered
   $popularProducts = DB::table('orders')
   ->select('product_title', DB::raw('count(*) as total_orders'))
   ->groupBy('product_title')
   ->orderBy('total_orders', 'desc')
   ->get();

  return view('admin.popular_product', compact('popularProducts'));
  }
  public function user_activity_log()
  {
      // Your logic here 
       // Fetch all users from the database
    // $users = \App\Models\User::all();
    // Fetch users with their username, email, and registration datetime
    // $users = \App\Models\User::select('name', 'email', 'created_at')->get();

    // return view('admin.user_activity_log', compact('users'));
    // Pass the users to the view
    // return view('admin.user_activity_log', compact('users'));
      // return view('admin.user_activity_log');
    //   $users = \App\Models\User::select('users.name', 'users.email', 'users.created_at', DB::raw('COUNT(orders.id) as total_paid_orders'))
    //     ->leftJoin('orders', function($join) {
    //         $join->on('users.id', '=', 'orders.user_id')
    //              ->where('orders.payment_status', '=', 'Paid');
    //     })
    //     ->groupBy('users.id', 'users.name', 'users.email', 'users.created_at')
    //     ->get();

    // return view('admin.user_activity_log', compact('users'));
    $users = \App\Models\User::select(
      'users.name', 
      'users.email', 
      'users.created_at', 
      DB::raw('SUM(orders.quantity) as total_products_ordered'), // Total products ordered
      DB::raw('SUM(orders.price) as total_money_spent')    // Total money spent
  )
  ->leftJoin('orders', function($join) {
      $join->on('users.id', '=', 'orders.user_id')
           ->where('orders.payment_status', '=', 'Paid');
  })
  ->groupBy('users.id', 'users.name', 'users.email', 'users.created_at')
  ->get();

return view('admin.user_activity_log', compact('users'));
  }
  public function daily_monthly_sale()
  {
    // Fetch daily sales
    $dailySales = Order::whereDate('created_at', '=', now()->toDateString())
        ->sum('price');

    // Fetch weekly sales
    $weeklySales = Order::whereBetween('created_at', [
        now()->startOfWeek(), now()->endOfWeek()
    ])->sum('price');

    // Fetch monthly sales
    $monthlySales = Order::whereMonth('created_at', '=', now()->month)
        ->sum('price');

      return view('admin.daily_monthly_sale', compact('dailySales', 'weeklySales', 'monthlySales'));
  }  
  public function top_selling()
  {
    // Fetch products ordered by the number of times they have been ordered
    $topSellingProducts = DB::table('orders')
        ->select('product_title', DB::raw('count(*) as total_orders'))
        ->groupBy('product_title')
        ->orderBy('total_orders', 'desc')
        ->get();
    return view('admin.top_selling', compact('topSellingProducts'));
  }
  public function sale_by_cateogry(){
    // Fetch sales grouped by category
    $salesByCategory = DB::table('products')
        ->join('orders', 'products.id', '=', 'orders.product_id')
        ->select('products.category', DB::raw('SUM(orders.price) as total_sales'))
        ->groupBy('products.category')
        ->orderBy('total_sales', 'desc')
        ->get();
    return view('admin.sale_by_cateogry', compact('salesByCategory'));
  }
  public function sale_by_reqion()
 {
  // Assuming you have a 'region' field in your 'orders' table
    $salesByRegion = DB::table('orders')
        ->select('address', DB::raw('SUM(price) as total_sales'))
        ->groupBy('address')
        ->orderBy('total_sales', 'desc')
        ->get();
    return view('admin.sale_by_reqion', compact('salesByRegion'));
 }
 public function sale_growth()
 {
  // Calculate sales for the current period (e.g., this month)
  $currentPeriodSales = Order::whereMonth('created_at', '=', now()->month)
  ->sum('price');

// Calculate sales for the previous period (e.g., last month)
$previousPeriodSales = Order::whereMonth('created_at', '=', now()->subMonth()->month)
  ->sum('price');

// Calculate growth rate
$growthRate = 0;
if ($previousPeriodSales > 0) {
  $growthRate = (($currentPeriodSales - $previousPeriodSales) / $previousPeriodSales) * 100;
}

  return view('admin.sale_growth', compact('currentPeriodSales', 'previousPeriodSales', 'growthRate'));
 }
 public function new_vs_Returning_Customers()
 {
  // Define the date range for "new" customers (e.g., within the last 30 days)
  $dateRange = now()->subDays(30);

  // Count new customers who registered within the defined date range
  $newCustomers = DB::table('users')
      ->where('created_at', '>=', $dateRange)
      ->count();

  // Count returning customers who placed orders outside the defined date range
  $returningCustomers = DB::table('orders')
      ->join('users', 'orders.user_id', '=', 'users.id')
      ->where('users.created_at', '<', $dateRange)
      ->distinct('users.id')
      ->count('users.id');
    return view('admin.new_vs_Returning_Customers', compact('newCustomers', 'returningCustomers'));
 }
 public function customer_demo()
 {
  // Fetch customer data
  $customers = \App\Models\User::select('name', 'email', 'address', 'phone')
  ->get();

// Pass the customer data to the view
    return view('admin.customer_demo', compact('customers'));
 }
 public function customer_purchase_f()
 {
  $customerPurchaseFrequency = DB::table('users')
        ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.name', 'users.email', DB::raw('COUNT(orders.id) as purchase_count'))
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderBy('purchase_count', 'desc')
        ->get();

    return view('admin.customer_purchase_f', compact('customerPurchaseFrequency'));
 }
 public function customer_lifetime_value()
 {
  
  $customerLifetimes = DB::table('users')
  ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
  ->select('users.name', 'users.email',
      DB::raw('SUM(orders.price) as total_spent'),
      DB::raw('COUNT(orders.id) as purchase_count'),
      DB::raw('DATEDIFF(MAX(orders.created_at), MIN(orders.created_at)) as customer_lifespan')
  )
  ->groupBy('users.id', 'users.name', 'users.email')
  ->get();

foreach ($customerLifetimes as $customer) {
  $customer->average_purchase_value = $customer->total_spent / max($customer->purchase_count, 1);
  $customer->customer_lifetime_value = $customer->average_purchase_value * $customer->purchase_count * ($customer->customer_lifespan / 365);
}
  return view('admin.customer_lifetime_value', compact('customerLifetimes'));
 }
 public function customer_feedback_review()
 {
  return view('admin.customer_feedback_review');
 }
 public function inventory_levels()
 {
  // Fetch all products and their quantities
  $products = Product::select('title', 'quantity', 'category')->get();
  return view('admin.inventory_levels', compact('products'));
 }
 public function product_return_rate()
 {
  return view('admin.product_return_rate');
 }
}

