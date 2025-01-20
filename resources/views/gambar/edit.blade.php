@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Gambar</div>

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

                    <form action="{{ route('gambar.update', $gambar->id_gambar) }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Preview gambar yang ada -->
                        <div class="mb-3">
                            <label class="form-label">Gambar Saat Ini</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/public/uploads/'. $gambar->file_name) }}" 
                                     alt="Preview" 
                                     class="img-thumbnail"
                                     style="max-height: 200px;">
                            </div>
                        </div>

                        <!-- Input gambar baru -->
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                            <input type="file" 
                                   class="form-control" 
                                   id="gambar" 
                                   name="gambar" 
                                   accept="image/*">
                            <div class="form-text">Biarkan kosong jika tidak ingin mengganti gambar.</div>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" 
                                      id="keterangan" 
                                      name="keterangan" 
                                      rows="3">{{ $gambar->keterangan }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('gambar.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection