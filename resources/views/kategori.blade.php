@extends('layouts.main')
@section('Content')

<form action="{{ route('kategori.store')}}" method="POST" enctype="multipart/form-data">
    @csrf   
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Kategori</label>
        <input class="form-control @error('Katedori') is-invalid @enderror" id="Kategori" rows="3" name="Kategori">{{ old('Kategori') }}</input>
        @error('Kategori')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>
@endsection
