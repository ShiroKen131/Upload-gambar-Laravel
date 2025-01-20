@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload Gambar Baru</div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('gambar.store') }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file_name" class="form-label">Pilih Gambar</label>
                            <input type="file" 
                                   class="form-control" 
                                   id="file_name" 
                                   name="file_name" 
                                   accept="image/*"
                                   required>
                            <div class="form-text">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.</div>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" 
                                      id="keterangan" 
                                      name="keterangan" 
                                      rows="3"
                                      placeholder="Masukkan keterangan gambar (opsional)"></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="{{ route('gambar.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection