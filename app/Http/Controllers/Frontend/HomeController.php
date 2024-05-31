<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $artikel = Artikel::orderBy('id', 'DESC')->paginate(5);
        return view('frontend.layouts.master', compact('artikel'));
    }

    public function detail($slug)
    {
        $detailArtikel = Artikel::where('slug', $slug)->first();
        return view('frontend.detail-artikel', compact('detailArtikel'));
    }
}
