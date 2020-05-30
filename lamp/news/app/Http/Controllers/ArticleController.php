<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request){
        $articles = Article::paginate(20);
        return view("articles.list", ["articles" => $articles]);
    }

    public function showNewForm(Request $request){
        return view("articles.new");
    }

    public function create(Request $request){
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->input("content");
        $path = $request->file("feature")->store("features", "public");
        $article->feature = $path;
        $article->save();
        return redirect(route("articles.list"));
    }

    public function show(Request $request, $id){
        $article = Article::find($id);
        return view("articles.show", ["article" => $article]);
    }

    public function delete(Request $request, $id){
        $article = Article::find($id);
        $article->delete();
        return redirect("/");
    }
}
