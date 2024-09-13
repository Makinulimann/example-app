<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Checkup;

class CheckupController extends Controller
{
    public function showCheckup()
    {
        $checkups = Checkup::where('user_id', Auth::id())->get();
        return view('checkup', ['checkups' => $checkups]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'age' => 'required|integer',
            'phone' => 'required|string|max:15',
            'height' => 'required|integer',
            'weight' => 'required|integer',
            'rumah_sakit' => 'required|string|max:255',
        ]);

        Checkup::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'age' => $request->age,
            'phone' => $request->phone,
            'height' => $request->height,
            'weight' => $request->weight,
            'rumah_sakit' => $request->rumah_sakit,
        ]);

        return redirect()->back()->with('success', 'Checkup data has been added');
    }
}
