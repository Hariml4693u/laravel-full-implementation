@extends('layouts.master')
@section('content')
    <div class="mt-5">
        {{-- check session --}}
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="container">
    <div class="row">
        <div class="col-auto">
            <h2>List Product</h2>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end">
                <a href="{{ route('profiles.index') }}" class="btn btn-primary" style="text-decoration: none;">Lihat Profile</a>
                <a href="{{ route('posts.create') }}" class="btn btn-dark ms-3">Tambah Product</a>
                <a href="{{ route('landing.index') }}" class="btn btn-secondary ms-3">Kembali Halaman Product</a>
            </div>
        </div>
    </div>
</div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Stock</th>
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>kondisi</th>
                    <th>deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr style="text-align: center;">
                        <td>{{ $loop->iteration + $posts->firstItem() - 1 }}</td>
                        <td>{{ $post->gambar }}</td>
                        <td>{{ $post->nama }}</td>
                        <td>{{ $post->stock }}</td>
                        <td>{{ $post->berat }}</td>
                        <td>{{ $post->harga }}</td>
                        <td>{{ $post->kondisi }}</td>
                        <td>{{ $post->deskripsi }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {{ $posts->links() }}
        </div>
    </div>
@endsection