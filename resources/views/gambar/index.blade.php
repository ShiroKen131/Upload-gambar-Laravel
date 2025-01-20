<!-- resources/views/gambar/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar Gambar</h5>
                    <a href="{{ route('gambar.create') }}" class="btn btn-primary">Upload Gambar Baru</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @forelse($gambars as $gambar)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/public/uploads/' . $gambar->file_name) }}" 
                                         class="card-img-top"
                                         alt="Gambar"
                                         style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <p class="card-text">{{ $gambar->keterangan ?? 'Tidak ada keterangan' }}</p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="{{ route('gambar.show', $gambar->id_gambar) }}" 
                                                   class="btn btn-info btn-sm">Lihat</a>
                                                <a href="{{ route('gambar.edit', $gambar->id_gambar) }}" 
                                                   class="btn btn-warning btn-sm">Edit</a>
                                            </div>
                                            <form action="{{ route('gambar.destroy', $gambar->id_gambar) }}" 
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    Belum ada gambar yang diupload.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection