<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $items = [
            ['route' => route('admin.home.index'), 'title' => 'داشبورد']
        ];

        //$data['unreadMessages'] =unreadMessage();
        $data['users'] = User::count();

        $admin = auth()->guard('admin')->user();

        return view("admin.home.index", compact("items", 'data', 'admin'));
    }

    public function test()
    {
        return redirect()->back()->with('msg', 'این یک پیام تست است');
    }
}
