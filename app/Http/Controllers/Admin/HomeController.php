<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.home', [
            'menus' => $this->adminMenus(),
        ]);
    }

    private function adminMenus()
    {
        return collect([
            'home' => collect([
                'name' => __('Home'),
                'url' => route('admin::home'),
            ]),

            'articles' => collect([
                'name' => __('Articles'),
                'url' => route('admin::articles::all'),
            ]),

            'categories' => collect([
                'name' => __('Categories'),
                'url' => route('admin::articles::all'),
            ]),

            'tickets' => collect([
                'name' => __('Tickets'),
                'url' => route('admin::articles::all'),
            ]),

            'users' => collect([
                'name' => __('Users'),
                'url' => route('admin::articles::all'),
            ]),

            'settings' => collect([
                'name' => __('Settings'),
                'url' => route('admin::articles::all'),
            ]),
        ]);
    }
}
