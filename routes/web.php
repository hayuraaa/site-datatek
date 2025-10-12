<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PublicMateriController;
use App\Http\Controllers\PublicBannerController;

// Initialize banner controller
$bannerController = new PublicBannerController();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pengembangan-kapasitas', function () {
    return Inertia::render('PengembanganKapasitas');
})->name('pengembangan-kapasitas');

Route::get('/akademik', function () {
    return Inertia::render('Akademik');
})->name('akademik');

Route::get('/kompetisi', function () {
    return Inertia::render('Kompetisi');
})->name('kompetisi');

Route::get('/kebijakan-ruang-ramah', function () {
    return Inertia::render('KebijakanRuangRamah');
})->name('kebijakan-ruang-ramah');

Route::get('/materi', [PublicMateriController::class, 'index'])->name('materi');

Route::get('/kontak', function () {
    return Inertia::render('Kontak');
})->name('kontak');

Route::post('/contact-forms/submit', [ContactFormController::class, 'submit'])->name('contact.submit');