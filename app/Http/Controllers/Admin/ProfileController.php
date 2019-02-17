<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.edit_profile', [
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password'))
        {
            $user->password = \Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin::edit-profile')
            ->with('success', __('Profile saved successfully'));
    }
}
