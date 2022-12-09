<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Ramsey\Uuid\Uuid;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $berita = Berita::latest()->with('kategori')->get();
        $data = [
            'title'     => 'Daftar Berita',
            'menu'      => $menu,
            'berita'    => $berita
        ];

        return view('dashboard.berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $kategori = Kategori::latest()->get();
        $data = [
            'title'     => 'Tambah Berita',
            'menu'      => $menu,
            'kategori'  => $kategori
        ];

        return view('dashboard.berita.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required|max:100|unique:berita,judul_berita',
            'kategori' => 'required',
            'isi_berita' => 'required|max:200',
        ]);

        Berita::create([
            'berita_id'     => Uuid::uuid4()->getHex(),
            'judul_berita'  => $request->judul_berita,
            'kategori_id'   => $request->kategori,
            'isi_berita'    => $request->isi_berita
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $beritum)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Detail Berita',
            'menu'      => $menu,
            'berita'      => $beritum,
        ];

        return view('dashboard.berita.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $kategori = Kategori::latest()->get();
        $data = [
            'title'         => 'Ubah Berita',
            'menu'          => $menu,
            'berita'        => $beritum,
            'kategori'      => $kategori
        ];

        return view('dashboard.berita.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul_berita' => 'required|max:100|unique:berita,judul_berita,'. $beritum->berita_id.',berita_id',
            'kategori' => 'required',
            'isi_berita' => 'required|max:200',
        ]);

        $beritum->update([
            'berita_id'     => Uuid::uuid4()->getHex(),
            'judul_berita'  => $request->judul_berita,
            'kategori_id'   => $request->kategori,
            'isi_berita'    => $request->isi_berita
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $beritum->delete($beritum->berita_id);
        return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus');
    }
}
