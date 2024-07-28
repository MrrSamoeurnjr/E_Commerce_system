<?php

namespace App\Http\Controllers;

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
}
