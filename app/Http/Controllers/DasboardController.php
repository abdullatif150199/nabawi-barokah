<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        $visitors = Applicant::latest()->get();
        $totalArticles = Article::count();
        $totalPackages = Package::count();
        $totalTestimonials = Testimonial::count();
        $totalDocumentations = Documentation::count();

        return view('backend.pages.dashboard.index', compact('visitors', 'totalArticles', 'totalPackages', 'totalTestimonials', 'totalDocumentations'));
    }
}
