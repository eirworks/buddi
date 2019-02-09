<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.settings.settings');
    }

    public function store(Request $request)
    {
        setting($request->input('settings', []))->save();

        return redirect()->route('admin::settings::all');
    }
}
