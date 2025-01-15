<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index()
    {
        // $categories = NewsCategory::with('children')->whereNull('parent_id')->get();
        $categories = NewsCategory::whereNull('parent_id')->with('children')->get();
        $news = News::with('user', 'categories')->orderBy('created_at', 'desc')->get();
        return view('news.index', compact('categories', 'news'));
    }

    public function category($id)
    {
        $category = NewsCategory::with('news.user', 'news.categories')->findOrFail($id);
        return view('news.category', compact('category'));
    }

    public function show($id)
    {
        $news = News::with('user', 'categories')->findOrFail($id);
        return view('news.show', compact('news'));
    }
}
