<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller{

    function index(){
        return view('admin.home.index')->with("title", "Admin Page - Tienda Online");
    }
}
