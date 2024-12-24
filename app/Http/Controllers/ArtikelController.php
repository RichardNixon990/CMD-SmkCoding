<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index(){
        $Category = Category::all();
        return view('add-image',[
            'Kategori' => $Category,
            'data' => null

        ]);
    }
    public function edit(post $post){
        $Category = Category::all();
        return view('add-image',[
            'Kategori' => $Category,
            'data' => $post

        ]);
    }

    public function update(Request $request, post $post){
           $request->validate([
            'Judul' => 'required|min:5',
            // 'Kategori' =>
            'Deskripsi' => 'required|min:10',
        ]);

        if ($request->hasFile('File')) {
            $path = $request->file('File')->store('images', 'public');
            $post->image = $path;
        }

        $post->user_id = 1;
        $post->category_id = $request->kategori;
        $post->judul = $request->Judul;
        $post->body = $request->Deskripsi;
        $post->save();
        return redirect()->route('artikel.manage');
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
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->kategori;
        $post->judul = $request->Judul;
        $post->body = $request->Deskripsi;
        $post->image = $path;
        $post->save();
        return redirect()->route('home');
    }

        public function manage() {
            $articles = Post::orderBy('created_at', 'desc')->paginate(5);
            return view('manage-artikel',[
                'articles' => $articles
            ]);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('artikel.manage');

    }
}
