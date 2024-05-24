@extends('layouts.master')
@section('content')
<div class="mt-5">


    @if ($errors->any())
        <div class="alert alert-danger mt-3">Silahkan mengisi data dengan benar</div>
    @endif

    <div class="row">
        <div class="col-md-6 offset-3 bg-info rounded py-3">
        <div class="d-flex justify-content-between align-items-center">
        <h2>Tambah Product</h2>
       </div>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Product</label>
                    <input type="file" class="form-control {{$errors->has('gambar') ? 'is-invalid' : ''}}" id="nama" name="gambar">
                    {{-- check error --}}
                    @if ($errors->has('gambar'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gambar') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" id="nama" name="nama">
                    {{-- check error --}}
                    @if ($errors->has('nama'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nama') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control {{$errors->has('stock') ? 'is-invalid' : ''}}" id="stock" name="stock">
                    {{-- check error --}}
                    @if ($errors->has('stock'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stock') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="number" class="form-control {{$errors->has('berat') ? 'is-invalid' : ''}}" id="berat" name="berat">
                    {{-- check error --}}
                    @if ($errors->has('berat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('berat') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">harga</label>
                    <input type="number" class="form-control {{$errors->has('harga') ? 'is-invalid' : ''}}" id="harga" name="harga">
                    {{-- check error --}}
                    @if ($errors->has('harga'))
                        <div class="invalid-feedback">
                            {{ $errors->first('harga') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold">Kondisi Barang</label>
                        <select class="form-select" name="kondisi" id="">
                            <option value="0" selected>Pilih kondisi Barang</option>
                            <option value="Baru">Baru</option>
                            <option value="Bekas">Bekas</option>
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control {{$errors->has('deskripsi') ? 'is-invalid' : ''}}" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    @if ($errors->has('deskripsi'))
                        <div class="invalid-feedback">
                            {{ $errors->first('deskripsi') }}
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-center align-items-center mb-3">
                <a href="{{ route('landing.index') }}" class="btn btn-lg btn-warning">Kembali</a>
                <button type="submit" class="btn btn-lg btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection