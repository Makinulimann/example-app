<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'password' => 'string|min:6',
            'phone' => 'nullable|string|max:15',
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/photos/' . $user->photo);
            }
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
            $user->photo = $photoName;
        }

        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->phone = $request->input('phone');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->weight = $request->input('weight');
        $user->height = $request->input('height');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
