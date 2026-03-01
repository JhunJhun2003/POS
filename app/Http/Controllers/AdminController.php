<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('index');
    }

    public function item(){
        return view('Item.index');
    }

    public function order(){
        return view('order.index');
    }

    public function report(){
        return view('report.index');
    }

    public function user(){
        return view('user.userMenu');
    }
}
