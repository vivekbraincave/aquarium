<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OutletController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/all-gallery', [IndexController::class, 'all_gallery'])->name('all-gallery');
Route::get('/contact', [ContactUsFormController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::resource('/roles', RoleController::class);

    // user management
    Route::resource('/users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.index.update');


    // faqs
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs/store', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/show', [FaqController::class, 'show'])->name('faqs.show');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [FaqController::class, 'destroy'])->name('faqs.destroy');

    // brands
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // contact messages
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // pages
    Route::get('/pages/index', [HomeController::class, 'index'])->name('pages.index');
    Route::post('/pages/index', [HomeController::class, 'index'])->name('pages.index');
    Route::get('/pages/small-gallery', [HomeController::class, 'small_gallery'])->name('pages.small-gallery');
    Route::post('/pages/small-gallery/upload', [HomeController::class, 'uploadImage'])->name('pages.small-gallery.upload');
    Route::get('/pages/small-gallery/{id}/edit', [HomeController::class, 'editImage'])->name('pages.small-gallery.edit');
    Route::delete('/pages/small-gallery/{id}/delete', [HomeController::class, 'deleteImage'])->name('pages.small-gallery.delete');
    Route::get('/pages/manage-about', [HomeController::class, 'manageAbout'])->name('pages.manage-about');
    Route::post('/pages/manage-about', [HomeController::class, 'update'])->name('pages.manage-about.update');
    Route::get('/pages/all-banner', [HomeController::class, 'manageBanner'])->name('pages.all-banner');
    Route::post('/pages/update-banner', [HomeController::class, 'updateBanner'])->name('pages.update-banner');


    // Outlets
    Route::get('/outlets', [OutletController::class, 'index'])->name('outlets.index');
    Route::get('/outlets/create', [OutletController::class, 'create'])->name('outlets.create');
    Route::post('/outlets', [OutletController::class, 'store'])->name('outlets.store');
    Route::get('/outlets/{outlet}/edit', [OutletController::class, 'edit'])->name('outlets.edit');
    Route::put('/outlets/{outlet}', [OutletController::class, 'update'])->name('outlets.update');
    Route::delete('/outlets/{outlet}', [OutletController::class, 'destroy'])->name('outlets.destroy');

});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';