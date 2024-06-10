<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $listarticle = Article::all();
        return view('user.demo1.list_berita', ['listarticle' => $listarticle]);
    }

    public function create()
    {
        return view('user.demo1.create_berita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $cover = $request->file('cover');
        $coverName = time().'.'.$cover->extension();
        $cover->move(public_path('covers'), $coverName);

        Article::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori' => $request->kategori,
            'tanggal_upload' => now(),
            'cover' => $coverName,
        ]);

        return redirect()->route('list_berita')->with('success', 'Berita berhasil dibuat.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('list_berita')->with('success', 'Berita berhasil dihapus');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('user.demo1.edit_berita', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $coverName = time().'.'.$cover->extension();
            $cover->move(public_path('covers'), $coverName);
            $article->cover = $coverName;
        }

        $article->judul = $request->judul;
        $article->isi = $request->isi;
        $article->kategori = $request->kategori;
        $article->tanggal_upload = now();
        $article->save();

        return redirect()->route('list_berita')->with('success', 'Berita berhasil diupdate.');
    }
}
