<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        // arahkan ke resources/views/site/home.blade.php
        return view('site.home');
    }
    public function struktur()
    {
        // arahkan ke resources/views/site/struktur.blade.php
        return view('site.struktur');
    }

    public function layanan()
    {
        // arahkan ke resources/views/site/layanan.blade.php
        return view('site.layanan');
    }

    public function lokasi()
    {
        // arahkan ke resources/views/site/lokasi.blade.php
        return view('site.lokasi');
    }


    public function visi()
    {
        // arahkan ke resources/views/site/visi.blade.php
        return view('site.visi');
    }

    public function dashboard()
    {
        return view('site.dashboard');
    }
    public function jadwal()
    {
    return view('site.jadwal');
    }

}
