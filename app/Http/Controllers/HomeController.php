<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // Get sliders berdasarkan kategori ID = 1 (aktif & terurut)
        $sliders = Slider::where('slider_category_id', 1)
            ->where('is_active', true)
            ->orderBy('urutan')
            ->get();

        // Get banners
        $bannerController = new \App\Http\Controllers\PublicBannerController();
        $banners = $bannerController->getBannersForSite('datatek');

        return Inertia::render('Home', [
            'banners' => $banners,
            'sliders' => $sliders
        ]);
    }
}