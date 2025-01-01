<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Mechanisms\HandleComponents\ViewContext;

class SuperAdminController extends Controller
{
    public function user_role_permission()
    {
        return view('superadmin.user_role_permission');
    }
}
