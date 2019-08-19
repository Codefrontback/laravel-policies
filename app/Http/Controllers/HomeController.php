<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();

        return view('home', compact('articles'));
    }

    public function postDeleteArticle(Request $request)
    {
        $article = Article::find($request->get('delete_id'))->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
