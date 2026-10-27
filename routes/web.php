<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PacketController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('', [FrontendController::class, 'home'])->name('frontend.home');
    Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
    Route::get('/gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');
    Route::post('/galleryDetail/{id}', [FrontendController::class, 'galleryDetail'])->name('frontend.galleryDetail');
    Route::get('/service', [FrontendController::class, 'service'])->name('frontend.service');

    Route::prefix('pricelist')->group(function () {
        // Route::prefix('packet')->group(function () {
        //     Route::get('/', function () {
        //         $data['titlePage'] = 'Pricelist Packet';
        //         return view('pages.frontend.pricelist.packet', $data);
        //     })->name('frontend.pricelist.packet.index');

        //     Route::get('/{id}', function (string $id) {
        //         $data['titlePage'] = 'Pricelist Detail Packet';
        //         $data['id'] = $id;
        //         return view('pages.frontend.pricelist.detail', $data);
        //     })->name('frontend.pricelist.packet.detail');
        // });
        Route::prefix('packet')->group(function () {
            Route::get('/', [FrontendController::class, 'packet'])->name('frontend.pricelist.packet.index');

            Route::get('/{id}', [FrontendController::class, 'packetDetail'])->name('frontend.pricelist.packet.detail');
        });

        Route::prefix('tent')->group(function () {
            Route::get('/', [FrontendController::class, 'tent'])->name('frontend.pricelist.tent.index');

            Route::get('/{id}', [FrontendController::class, 'packetDetail'])->name('frontend.pricelist.tent.detail');
        });

        // Route::prefix('makeup')->group(function () {
        //     Route::get('/', function () {
        //         $data['titlePage'] = 'Pricelist Make Up';
        //         return view('pages.frontend.pricelist.makeup', $data);
        //     })->name('frontend.pricelist.makeup.index');

        //     Route::get('/{id}', function (string $id) {
        //         $data['titlePage'] = 'Pricelist Detail Make Up';
        //         $data['id'] = $id;
        //         return view('pages.frontend.pricelist.detail', $data);
        //     })->name('frontend.pricelist.makeup.detail');
        // });

        Route::prefix('makeup')->group(function () {
            Route::get('/', [FrontendController::class, 'makeup'])->name('frontend.pricelist.makeup.index');

            Route::get('/{id}', [FrontendController::class, 'makeupDetail'])->name('frontend.pricelist.makeup.detail');
        });

        // Route::prefix('accessories')->group(function () {
        //     Route::get('/', function () {
        //         $data['titlePage'] = 'Pricelist Aksesoris';
        //         return view('pages.frontend.pricelist.accessories', $data);
        //     })->name('frontend.pricelist.accessories.index');

        //     Route::get('/{id}', function (string $id) {
        //         $data['titlePage'] = 'Pricelist Detail Aksesoris';
        //         $data['id'] = $id;
        //         return view('pages.frontend.pricelist.detail', $data);
        //     })->name('frontend.pricelist.accessories.detail');
        // });
        Route::prefix('accessories')->group(function () {
            Route::get('/', [FrontendController::class, 'accessories'])->name('frontend.pricelist.accessories.index');

            Route::get('/{id}', [FrontendController::class, 'accessoriesDetail'])->name('frontend.pricelist.accessories.detail');
        });
    });
});


Route::prefix('admin')->group(function () {
    Route::get('/', [AuthenticationController::class, 'index'])->name('admin.main');

    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::get('/dologin', [AuthenticationController::class, 'index'])->name('admin.login');
    Route::post('/loginPage', [AuthenticationController::class, 'do_login'])->name('admin.do_login');
    Route::get('/logout', [AuthenticationController::class, 'do_logout'])->name('admin.logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        Route::prefix('packet')->group(function () {
            Route::get('/', [PacketController::class, 'index'])->name('admin.packet.index');
            Route::get('/create', [PacketController::class, 'create'])->name('admin.packet.create');
            Route::post('/store', [PacketController::class, 'store'])->name('admin.packet.store');
            Route::get('/show/{id}', [PacketController::class, 'show'])->name('admin.packet.show');
            Route::get('/edit/{id}', [PacketController::class, 'edit'])->name('admin.packet.edit');
            Route::patch('/update/{id}', [PacketController::class, 'update'])->name('admin.packet.update');
            Route::post('/upload', [PacketController::class, 'upload'])->name('admin.packet.upload');
            Route::delete('/destroy/{id}', [PacketController::class, 'destroy'])->name('admin.packet.destroy');
            Route::delete('/remove', [PacketController::class, 'remove'])->name('admin.packet.remove');
            Route::post('/reorder', [PacketController::class, 'reorder'])->name('admin.packet.reorder');
        });
        Route::patch('/profileUpdate', [AuthenticationController::class, 'profileUpdate'])->name('admin.profile.update');

        Route::prefix('pages')->group(function () {
            Route::get('/category', [PagesController::class, 'category'])->name('admin.pages.category');
            Route::get('/gallery', [PagesController::class, 'gallery'])->name('admin.pages.gallery');
            Route::get('/banner', [PagesController::class, 'banner'])->name('admin.pages.banner');
            Route::get('/packet', [PagesController::class, 'packet'])->name('admin.pages.packet');
        });

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::patch('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
            Route::post('/reorder', [CategoryController::class, 'reorder'])->name('admin.category.reorder');
        });

        Route::prefix('setting')->group(function () {
            Route::prefix('gallery')->group(function () {
                Route::get('/', [GalleryController::class, 'index'])->name('admin.setting.gallery.index');
                Route::get('/create', [GalleryController::class, 'create'])->name('admin.setting.gallery.create');
                Route::post('/store', [GalleryController::class, 'store'])->name('admin.setting.gallery.store');
                Route::get('/show/{id}', [GalleryController::class, 'show'])->name('admin.setting.gallery.show');
                Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('admin.setting.gallery.edit');
                Route::patch('/update/{id}', [GalleryController::class, 'update'])->name('admin.setting.gallery.update');
                Route::delete('/destroy/{id}', [GalleryController::class, 'destroy'])->name('admin.setting.gallery.destroy');
                Route::post('/upload', [GalleryController::class, 'upload'])->name('admin.setting.gallery.upload');
                Route::delete('/remove', [GalleryController::class, 'remove'])->name('admin.setting.gallery.remove');
                Route::post('/reorder', [GalleryController::class, 'reorder'])->name('admin.setting.gallery.reorder');
            });

            Route::prefix('banner')->group(function () {
                Route::get('/', [BannerController::class, 'index'])->name('admin.setting.banner.index');
                Route::get('/create', [BannerController::class, 'create'])->name('admin.setting.banner.create');
                Route::post('/store', [BannerController::class, 'store'])->name('admin.setting.banner.store');
                Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin.setting.banner.edit');
                Route::patch('/update/{id}', [BannerController::class, 'update'])->name('admin.setting.banner.update');
                Route::delete('/destroy/{id}', [BannerController::class, 'destroy'])->name('admin.setting.banner.destroy');
            });
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('admin.profile.index');
            // Route::get('/edit/{id}', [ProfileController::class, 'edit'])->name('admin.gallery.edit');
        });
    });
});


// ! Route Group with middleware
// Route::middleware('auth')->group(function () {
//     Route::prefix('admin')->group(function () {
//         Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
//         Route::get('/post/{id}', function ($id) {return view('postDetails'.$id);})->name('post');
//     });
// });

// ! Route Group with middleware and name
// Route::get('/dashboard', fn () => view('dashboard'))->middleware('auth')->name('dashboard');
