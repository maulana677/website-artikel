<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:5000'],
            'body' => ['required']
        ]);

        $artikel = new Artikel();
        $artikel->title = $request->title;
        $artikel->slug = Str::slug($request->title);
        $artikel->thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
        $artikel->body = $request->body;
        $artikel->user_id = auth()->user()->id;
        $artikel->save();

        toastr()->success('Data Berhasil Dibuat');
        return redirect()->route('admin.artikel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::all();
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('user', 'artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpeg,png,jpg', 'max:5000'],
            'body' => ['required']
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->title = $request->title;
        $artikel->slug = Str::slug($request->title);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($artikel->thumbnail) {
                Storage::disk('public')->delete($artikel->thumbnail);
            }
            // Simpan thumbnail baru
            $artikel->thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $artikel->body = $request->body;
        $artikel->user_id = auth()->user()->id;

        $artikel->save();

        toastr()->success('Data Berhasil Diperbarui');

        return redirect()->route('admin.artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus thumbnail dari storage
        if ($artikel->thumbnail) {
            Storage::disk('public')->delete($artikel->thumbnail);
        }

        // Hapus artikel dari database
        $artikel->delete();

        toastr()->success('Data berhasil dihapus');

        return redirect()->route('admin.artikel.index');
    }
}
