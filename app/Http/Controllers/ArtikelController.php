<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Category;

class ArtikelController extends Controller
{
    public function index(){
        $Category = Category::all();
        return view('add-image',[
            'Kategori' => $Category
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'Judul' => 'required|min:5',
            // 'Kategori' =>
            'Deskripsi' => 'required|min:10',
            'File' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('File')) {
            $path = $request->file('File')->store('images', 'public');
        } else {
            return back()->with('error', 'Foto tidak ditemukan');
        }

        $post = new post();
        $post->user_id = 1;
        $post->category_id = $request->kategori;
        $post->judul = $request->Judul;
        $post->body = $request->Deskripsi;
        $post->image = $path;
        $post->save();
        return redirect()->route('home');
    }
}
