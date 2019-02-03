<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.home', [
            'menus' => $this->adminMenus(),
            'stats' => $this->adminStats(),
        ]);
    }

    public function menus(Request $request)
    {
        return response()->json($this->adminMenus());
    }

    public function stats(Request $request)
    {
        return response()->json($this->adminStats());
    }

    private function adminStats()
    {
        return [
            'data' => [
                'articles_count' => [
                    'name' => __('Articles'),
                    'count' => Article::count(),
                ],
                'categories_count' => [
                    'name' => __('Categories'),
                    'count' => 0,
                ],
                'unread_tickets_count' => [
                    'name' => __('Tickets'),
                    'count' => 0,
                ],
            ]
        ];
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
