<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Youtube;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        $packages = Package::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $documentations = Documentation::latest()->get();
        $videos = Youtube::latest()->get();
        $setting = Setting::first();
        // $wa = !empty($setting->wa) ? $setting->wa : '6281234567890';
        $packageLists = Package::pluck('name', 'id');

        return view('frontend.pages.home', compact(
            'articles',
            'packages',
            'testimonials',
            'documentations',
            // 'announcement',
            'packageLists',
            'videos',
            'setting'
            // 'wa'
        ));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        $articles = Article::latest()->get();

        return view('frontend.pages.article', compact('article', 'articles'));
    }

    public function documentation($slug)
    {
        $documentation = Documentation::with('images')->where('slug', $slug)->firstOrFail();
        $documentations = Documentation::latest()->get();

        return view('frontend.pages.documentation', compact('documentation', 'documentations'));
    }
}
