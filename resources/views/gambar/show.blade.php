
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="car">
                <div class="card-header">Detail Gambar</div>

                <div class="card-body">
                    <img src="{{ asset('storage/public/uploads/' . $gambar->file_name) }}" 
                         class="img-fluid mb-3"
                         alt="Gambar">
                    
                    <h5>Keterangan:</h5>
                    <p>{{ $gambar->keterangan ?? 'Tidak ada keterangan' }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('gambar.index') }}" class="btn btn-secondary">Kembali</a>
                        <form action="{{ route('gambar.destroy', $gambar->id_gambar) }}" 
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus Gambar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection