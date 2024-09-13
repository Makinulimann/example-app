<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }
    public function home()
    {
        $articles = Article::all();
        return view('home', compact('articles'));
    }

    public function showListArticle(){
        $articles = Article::all(); 
        return view('listArticle', compact('articles'));
    }

    public function showArticle($id){
        $article = Article::findOrFail($id);
        return view('article', compact('article'));
    }

    public function adminPageArticle()
    {
        $articles = Article::all();
        return view('admin.adminpage', compact('articles'));
    }

    public function showListArticleAdmin(){
        $articles = Article::all(); 
        return view('admin.listArticleAdmin', compact('articles'));
    }
}
