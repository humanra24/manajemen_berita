@extends('dashboard.base')

@section('content')
    <h1 class="mt-4">{{ $data['title'] }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
        <li class="breadcrumb-item active">Tambah Berita</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('berita.index') }}" class=" text-decoration-none"><i
                            class="fas fa-arrow-left text-primary"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="judulBerita" class="form-label">Judul Berita</label>
                            <input type="text" class="form-control @error('judul_berita') is-invalid @enderror" id="judulBerita" name="judul_berita" value="{{ old('judul_berita') }}" />
                            @error('judul_berita')
                                <div id="judulBeritaHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="selected form-select  @error('kategori') is-invalid @enderror" name="kategori">
                                <option value="">Pilih Kategori</option>
                                @forelse ($data['kategori'] as $kategori)
                                    <option @if (old('kategori') == $kategori->kategori_id) selected @endif value="{{ $kategori->kategori_id }}">{{ $kategori->kategori }}</option>
                                @empty
                                    <option disabled>Tidak ada data</option>
                                @endforelse
                            </select>
                            @error('kategori')
                                <div id="kategoriHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="isiBerita" class="form-label">Isi Berita</label>
                            <textarea name="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror" id="" rows="5">{{ old('isi_berita') }}</textarea>
                            @error('isi_berita')
                                <div id="isiBeritaHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.selected').select2({
                theme: 'bootstrap-5'
            });
        });
    </script>
@endpush
