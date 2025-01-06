<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function checkToken($token)
    {
        try {
            $reset = DB::table('password_reset_tokens')
                ->where('token', hash('sha256', $token))
                ->first();
            
            if ($reset) {
                return response()->json([
                    'valid' => true,
                    'email' => $reset->email,
                    'created_at' => $reset->created_at
                ]);
            }
            
            return response()->json(['valid' => false]);
        } catch (\Exception $e) {
            \Log::error('Token check error: ' . $e->getMessage());
            return response()->json([
                'valid' => false,
                'error' => 'Error checking token'
            ], 500);
        }
    }
} 