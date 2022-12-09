<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title' => 'Dashboard',
            'menu'  => $menu
        ];
        return view('dashboard.index', compact('data'));
    }
}
