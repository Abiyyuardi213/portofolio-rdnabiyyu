<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'bio' => 'required',
        ]);

        $profile->update($request->all());

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
