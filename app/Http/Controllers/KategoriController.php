<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class KategoriController extends Controller
{
    public function index(){
        return view('kategori');
    }
    public function store(Request $request){
        $request->validate([
            'Kategori' => 'required|min:5',
        ]);
        $kategory = new Category();
        $kategory->judul_kategori = $request->Kategori;
        $kategory->save();
        return redirect()->route('artikel.add');
    }
}
