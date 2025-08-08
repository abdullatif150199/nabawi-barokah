<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->latest()->get();
        return view('backend.pages.article.index', compact('articles'));
    }

    public function create()
    {
        return view('backend.pages.article.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:articles,title',
            'img' => 'required|image',
            'content' => 'required|string',
        ]);

        $imageName = $request->file('img')->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
            'img' => $imageName,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('backend.pages.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
             'title' => 'required|string|unique:articles,title,'.$article->id,
            'content' => 'required|string',
        ]);

        if ($request->hasFile('img')) {
            $imageName = $request->file('img')->store('articles', 'public');
            $article->img = $imageName;
        }


        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->img) {
            Storage::disk('public')->delete($article->img);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
