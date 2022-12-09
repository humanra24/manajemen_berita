<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Dashboard',
            'menu'      => $menu,
            'berita'    => Berita::count(),
            'kategori'  => Kategori::count(),
            'user'      => User::count(),
        ];
        return view('dashboard.index', compact('data'));
    }
}
