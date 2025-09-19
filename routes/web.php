<?php

use App\Http\Controllers\AnouncementController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\YoutubeController;
use App\Http\Middleware\TrackVisitor;
use App\Models\Documentation;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Article;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([TrackVisitor::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/documentation/{slug}', [HomeController::class, 'documentation'])->name('dokumentasi.detail');
    Route::get('/artikel/{slug}', [HomeController::class, 'article'])->name('artikel.detail');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/export-visitors', [VisitorController::class, 'export'])->name('visitors.export');
Route::get('/api/visitors/monthly', [VisitorController::class, 'getMonthlyVisitorStats']);
Route::get('/api/visitors/weekly', [VisitorController::class, 'getWeeklyVisitorStats']);
Route::post('/applicants', [VisitorController::class, 'store'])->name('applicants.store');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DasboardController::class, 'index'])->name('dashboard');
    Route::resource('/articles', ArticleController::class);
    Route::resource('/documentations', DocumentationController::class);
    Route::resource('/packages', PackageController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('youtube', YoutubeController::class);
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

    Route::prefix('announcements')->name('announcements.')->group(function () {
        Route::get('/', [AnouncementController::class, 'index'])->name('index');
        Route::get('/create', [AnouncementController::class, 'create'])->name('create');
        Route::post('/', [AnouncementController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AnouncementController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AnouncementController::class, 'update'])->name('update');
        Route::delete('/{id}', [AnouncementController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/activate', [AnouncementController::class, 'activate'])->name('activate');
    });
});


// sitemap
Route::get('/sitemap.xml', function () {
    $sitemap = Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0));

    // Artikel statis (index artikel)
    // $sitemap->add(Url::create('/artikel')->setPriority(0.8));

    // Dokumentasi statis (index dokumentasi)
    // $sitemap->add(Url::create('/documentation')->setPriority(0.8));

    // Artikel dari database
    foreach (Article::all() as $article) {
        $sitemap->add(
            Url::create("/artikel/{$article->slug}")
                ->setLastModificationDate($article->updated_at ?? $article->created_at)
                ->setPriority(0.8)
        );
    }

    // Dokumentasi dari database
    foreach (Documentation::all() as $doc) {
        $sitemap->add(
            Url::create("/documentation/{$doc->slug}")
                ->setLastModificationDate($doc->updated_at ?? $doc->created_at)
                ->setPriority(0.8)
        );
    }

    return $sitemap->toResponse(request());
});

