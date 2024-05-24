<?php

namespace App\Http\Controllers;

use App\Models\merchant;
use Illuminate\Http\Request;
Use App\Models\Product;
Use App\Models\Post;

class MerchantController extends Controller
{
    // crud
    // create
    // read (done)
    // update
    // delete
    // filter
    // search


    public function index() {
        // $posts = Post::paginate();
        // $posts = Post::all();
        // $posts = Post::get();
        $posts = Post::latest()->paginate(10);

        return view('merchant.index', compact('posts'));
    }
    public function profiles() {
        return view('profiles.index');
    }

    public function create() {
        return view('posts.create');
    }
    public function Product() {
        $Product = Product::all();
        return view('posts.product');
    }

    public function store(Request $request) {
        $request->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'stock' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'required',
        ]);

        // Post::create([
        //     'gambar' => $request->gambar,
        //     'nama' => $request->nama,
        //     'stock' => $request->stock,
        //     'berat' => $request->berat,
        //     'harga' => $request->harga,
        //     'kondisi' => $request->kondisi,
        //     'deskripsi' => $request->deskripsi,
        // ]);

        $post = new Post();
        $post->gambar = $request->gambar;
        $post->nama = $request->nama;
        $post->stock = $request->stock;
        $post->berat = $request->berat;
        $post->harga = $request->harga;
        $post->kondisi = $request->kondisi;
        $post->deskripsi = $request->deskripsi;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully');

    }

    public function edit($id) {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'stock' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'kondisi' => 'required',
            'deskripsi' => 'required',
        ]);

        // $post = Post::find($id);
        // $post = Post::where('id', $id)->first();
        // $post->gambar = $request->gambar;
        // $post->nama = $request->nama;
        // $post->stock = $request->stock;
        // $post->berat = $request->berat;
        // $post->harga = $request->harga;
        // $post->kondisi = $request->kondisi;
        // $post->deskripsi = $request->deskripsi;
        // $post->save();

        Post::where('id', $id)->update([
            'gambar' => $request->gambar,
            'nama' => $request->nama,
            'stock' => $request->stock,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('posts.index')->with('success', 'Product berhasil di update.');
    }

    public function delete(Request $request, $id) {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}