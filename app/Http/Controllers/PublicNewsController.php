<?php

namespace App\Http\Controllers;

use App\Models\News;

class PublicNewsController extends Controller
{
    /**
     * Display homepage with latest news
     */
    public function homepage()
    {
        $latestNews = News::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        return view('index', compact('latestNews'));
    }

    /**
     * Display a listing of published news for public
     */
    public function index()
    {
        $news = News::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified news
     */ 
    public function show($slug)
    {
        $news = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('news.show', compact('news'));
    }

    /**
     * Get latest published news (for homepage widget)
     */
    public static function getLatestNews($limit = 3)
    {
        return News::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
