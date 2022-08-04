<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Article;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search),function($q){
            $search = request()->search;
            $q->where('title','like',"%$search%")->orWhere('description','like',"%$search%");
        })->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function detail($slug){
        $article = Article::where('slug',$slug)->first();
        if(empty($article)){
            return abort(404);
        }
        return view('blog.detail',compact('article'));
    }

    public function baseOnCategory($id){
        $articles = Article::when(isset(request()->search),function($q){
            $search = request()->search;
            $q->where('title','like',"%$search%")->orWhere('description','like',"%$search%");
        })->where('category_id',$id)->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function baseOnUser($id){
        $articles = Article::where('user_id',$id)->when(isset(request()->search),function($q){
            $search = request()->search;
            $q->where('title','like',"%$search%")->orWhere('description','like',"%$search%");
        })->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function baseOnDate($date){
        $articles = Article::where('created_at',$date)->when(isset(request()->search),function($q){
            $search = request()->search;
            $q->where('title','like',"%$search%")->orWhere('description','like',"%$search%");
        })->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    
}
