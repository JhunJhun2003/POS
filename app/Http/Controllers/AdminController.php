<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('index'); //for dashboard
    }

    public function item(){
        return view('Item.index'); //for add item
    }

    public function inventory(){
        return view('inventory.index'); //for inventory
    }
    public function order(){
        return view('bill.index');
    }

    public function report(){
        return view('report.index');
    }

    public function userMenu(){
        return view('user.userMenu');
    }
    public function user(){
        return view('user.index');
    }
}
