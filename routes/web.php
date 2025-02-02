<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AminController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\DB;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect']);
route::get('/',[HomeController::class,'index']);
route::get('/view_category',[AminController::class,'view_category']);
route::post('/add_category',[AminController::class,'add_category']);
route::get('/delete_category/{id}',[AminController::class,'delete_category']);
route::get('/view_product', [AminController::class, 'view_product']);
route::post('/add_product', [AminController::class, 'add_product']);
route::get('/show_product', [AminController::class, 'show_product']);
route::get('/delete_product/{id}', [AminController::class, 'delete_product']);
route::get('/update_product/{id}', [AminController::class, 'update_product']);
route::post('/update_product_confirm/{id}', [AminController::class, 'update_product_confirm']);
route::get('/product_detail/{id}',[HomeController::class,'product_detail']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/delete_cart/{id}',[HomeController::class,'delete_cart']);
route::get('/cash_order',[HomeController::class,'cash_order']);
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
route::get('/order',[AminController::class,'order']);
route::get('/delivery/{id}',[AminController::class,'delivery']);
route::get('/print_pdf/{id}',[AminController::class,'print_pdf']);
route::get('/send_email/{id}',[AminController::class,'send_email']);
route::post('/send_email_notification/{id}',[AminController::class,'send_email_notification']);
route::get('/searchData',[AminController::class,'searchData']);
route::get('/show_order',[HomeController::class,'show_order']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
Route::post('/add_comment', [HomeController::class, 'add_comment']);
route::post('/add_reply',[HomeController::class,'add_reply']);
route::get('/search',[HomeController::class,'search']);
route::get('/blog_template',[HomeController::class,'blog_template']);
route::get('/about_template',[HomeController::class,'about_template']);
route::get('/testmonial_template',[HomeController::class,'testmonial_template']);
route::get('/showallproduct',[HomeController::class,'showallproduct']);
route::get('/qrcodeforpaying',[HomeController::class,'qrcodeforpaying']);
route::get('/computer',[HomeController::class,'computer']);
route::get('/phone',[HomeController::class,'phone']);
route::get('/airpod',[HomeController::class,'airpod']);


route::get('/popular_product',[AminController::class,'popular_product']);
route::get('/contact_template',[HomeController::class,'contact_template']);
Route::get('/user_activity_log', [AminController::class, 'user_activity_log']);
Route::get('/daily_monthly_sale', [AminController::class, 'daily_monthly_sale']);
Route::get('/top_selling', [AminController::class, 'top_selling']);
Route::get('/sale_by_cateogry', [AminController::class, 'sale_by_cateogry']);
Route::get('/sale_by_reqion', [AminController::class, 'sale_by_reqion']);
Route::get('/sale_growth', [AminController::class, 'sale_growth']);
Route::get('/new_vs_Returning_Customers', [AminController::class, 'new_vs_Returning_Customers']);
Route::get('/customer_demo', [AminController::class, 'customer_demo']);
Route::get('/customer_purchase_f', [AminController::class, 'customer_purchase_f']);
Route::get('/customer_lifetime_value', [AminController::class, 'customer_lifetime_value']);
Route::get('/customer_feedback_review', [AminController::class, 'customer_feedback_review']);
Route::get('/inventory_levels', [AminController::class, 'inventory_levels']);
Route::get('/product_return_rate', [AminController::class, 'product_return_rate']);
Route::get('/user_role_permission', [SuperAdminController::class, 'user_role_permission']);

Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');

Route::get('/chats', [ChatController::class, 'adminChats'])->name('admin.chats');
Route::get('/chats/{chat}', [ChatController::class, 'adminViewChat'])->name('admin.viewChat');
Route::post('/chats/{chat}', [ChatController::class, 'adminSendMessage'])->name('admin.sendMessage');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Only use this in development!
Route::get('/check-tokens', function() {
    $tokens = DB::table('password_reset_tokens')->get();
    return response()->json([
        'tokens' => $tokens,
        'count' => $tokens->count()
    ]);
});

// Add these routes for password reset functionality
Route::get('/check-token/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'checkToken'])
    ->name('password.check-token');

// For development only - to view all tokens
Route::get('/check-tokens', function() {
    if (app()->environment('local')) {  // Only in local environment
        $tokens = DB::table('password_reset_tokens')->get();
        return response()->json([
            'tokens' => $tokens,
            'count' => $tokens->count()
        ]);
    }
    return abort(404);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/check-token/{token}', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'checkToken'])
        ->name('password.check-token');
});



