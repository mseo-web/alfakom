<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::with('children', 'news.user')->with('news.user')->get();
        return view('news_categories.index', compact('categories'));
    }
}
