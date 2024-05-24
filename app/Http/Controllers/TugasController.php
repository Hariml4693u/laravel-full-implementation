<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function getForm()
    {
        return view('/landing.form_request');
    }

    public function postForm(Request $req)
    {
        if (!$req->filled('name')) {
            return redirect()->back()->with('error', 'Error. Field Nama Produk Wajib diisi.');
        } else if (!$req->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat Wajib diisi.');
        } else if (!$req->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga Wajib diisi.');
        } else if (!$req->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok Wajib diisi.');
        } else if ($req->kondisi == 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi Wajib diisi.');
        } else if (!$req->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi Wajib diisi.');
        }



        $data = [
            [
                'image' => $req->gambar,
                'nama' => $req->name,
                'berat' => $req->berat,
                'harga' => $req->harga,
                'kondisi' => $req->kondisi,
                'deskripsi' => $req->deskripsi,
                'stok' => $req->stok,
            ],
        ];

        return view('products_catalog', ['products' => $data]);
    }
}

