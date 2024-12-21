@extends('layouts.main')
@section('Content')
    <div>
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('Judul') is-invalid @enderror" id="judul" name="Judul"
                    value="{{ old('Judul') }}">
                @error('Judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <i class="mb-3">Jika Belum Ada Kategori Silahkan buat kategori terlebih dahulu. <a href="/"
                        style="color: blue; cursor: pointer">Buat Kategori</a></i>
                <select class="form-select" aria-label="category" name="kategori">
                    <option selected disabled>Pilih Kategori</option>
                    @foreach ($Kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->judul_kategori }}</option>
                    @endforeach

                </select>
            </div>

            <br>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('Deskripsi') is-invalid @enderror" id="deskripsi" rows="3" name="Deskripsi">{{ old('Deskripsi') }}</textarea>
                @error('Deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload Gambar</label>
                <input type="file" name="File" class="form-control @error('File') is-invalid @enderror"
                    id="file">
                @error('File')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
@endsection
