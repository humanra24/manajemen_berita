<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $user = User::latest()->get();
        $data = [
            'title'     => 'Daftar user',
            'menu'      => $menu,
            'user'      => $user
        ];

        return view('dashboard.user.index', compact('data'));
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
            'title'     => 'Tambah user',
            'menu'      => $menu,
        ];

        return view('dashboard.user.create', compact('data'));
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
            'username' => 'required|max:100|unique:user,username',
            'password' => 'required|min:5|max:100|confirmed',
        ]);

        $validated['user_id'] = Uuid::uuid4()->getHex();
        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Detail User',
            'menu'      => $menu,
            'user'  => $user,
        ];

        return view('dashboard.user.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $menu = Menu::orderBy('number', 'asc')->get();
        $data = [
            'title'     => 'Ubah User',
            'menu'      => $menu,
            'user'      => $user,
        ];

        return view('dashboard.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|max:100|unique:user,username,'.$user->user_id.',user_id',
            'password' => 'required|min:5|max:100|confirmed',
        ]);

        $validated['password'] = Hash::make($request->password);
        $user->update($validated);

        return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete($user->user_id);
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
