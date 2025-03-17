<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if (Auth::user()->isAdm()) {
            return view('admin.users.index-admin');
        }
        return view('users.tickets.index-user');
    }
    
}
