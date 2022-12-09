<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Menu;
use Ramsey\Uuid\Uuid;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $kategori = Kategori::latest()->get();
        $data = [
            'title'     => 'Daftar Kategori',
            'menu'      => $menu,
            'kategori'  => $kategori
        ];

        return view('dashboard.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Tambah Kategori',
            'menu'      => $menu,
        ];

        return view('dashboard.kategori.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|max:100|unique:kategori,kategori'
        ]);

        $validated['kategori_id'] = Uuid::uuid4()->getHex();

        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Detail Kategori',
            'menu'      => $menu,
            'kategori'  => $kategori,
        ];

        return view('dashboard.kategori.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Ubah Kategori',
            'menu'      => $menu,
            'kategori'  => $kategori,
        ];

        return view('dashboard.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kategori' => 'required|max:100|unique:kategori,kategori,'.$kategori->kategori_id.',kategori_id'
        ]);

        $kategori->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete($kategori->kategori_id);
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
