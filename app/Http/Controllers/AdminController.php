<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Checkup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function kelola()
    {
        $users = User::all();
        return view('admin.kelola', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'string|max:20',
            'age' => 'nullable|integer|min:0',
            'gender' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
        ]);


        $user->update($request->only('name', 'email', 'role', 'age', 'gender', 'weight', 'height'));

        return redirect()->route('kelola')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('kelola')->with('success', 'User deleted successfully.');
    }

    // ARTIKEL
    public function kelolaArticle()
    {
        $articles = Article::all();
        return view('admin.kelolaArticle', compact('articles'));
    }

    public function createArticle()
    {
        return view('admin.createArticle');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/photos', $imageName);

        Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'image' => $imageName,
        ]);

        return redirect()->route('kelolaArticle')->with('success', 'Article created successfully.');
    }

    public function editArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.editArticle', compact('article'));
    }

    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $article = Article::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::delete('public/photos/' . $article->image);
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/photos', $imageName);
            $article->image = $imageName;
        }

        $article->update($request->only('title', 'category', 'content'));

        return redirect()->route('kelolaArticle')->with('success', 'Article updated successfully.');
    }

    public function destroyArticle($id)
    {
        $article = Article::findOrFail($id);
        if ($article->image) {
            Storage::delete('public/photos/' . $article->image);
        }
        $article->delete();

        return redirect()->route('kelolaArticle')->with('success', 'Article deleted successfully.');
    }
    public function logoutAdmin()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('index');
    }
    // Checkup

    public function listCheckup()
    {
        $checkups = Checkup::all();
        return view('admin.checkups', compact('checkups'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $checkup = Checkup::findOrFail($id); // Mengambil Checkup berdasarkan ID
        $request->validate([
            'status' => 'required|string|max:20'
        ]);
    
        $checkup->update($request->only('status')); // Mengupdate status
    
        return redirect()->route('admin.checkups')->with('success', 'Status berhasil diperbarui.');
    }
}
