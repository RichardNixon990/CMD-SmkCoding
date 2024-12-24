@extends('layouts.main')
@section('Content')
    <div>
        @if ($data != null)
        <form action="{{ route('artikel.update', $data->id ) }}" method="POST" enctype="multipart/form-data">
    @else
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
    @endif
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('Judul') is-invalid @enderror" id="judul" name="Judul"
                    value="{{ $data!= null ? $data->judul : old('Judul') }}">
                @error('Judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
           <div class="mb-3">
            <p>Belum memiliki kategori?<a href="{{ route('kategori.add') }}"><i> Buat kategori di sini</i></a></p>
            <select class="form-select" aria-label="kategori" name="kategori">
                <option {{ $data != null ? '' : 'selected' }} disabled>Pilih Kategori</option>
                @foreach ($Kategori as $k)
                    <option value="{{ $k->id }}"
                        {{ $data != null && $data->category_id == $k->id ? 'selected' : '' }}>
                        {{ $k->judul_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

            <br>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('Deskripsi') is-invalid @enderror" id="deskripsi" rows="3" name="Deskripsi">{{ $data!= null ? $data->body : old('Deskripsi') }}</textarea>
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
