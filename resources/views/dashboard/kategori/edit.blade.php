@extends('dashboard.base')

@section('content')
    <h1 class="mt-4">{{ $data['title'] }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li>
        <li class="breadcrumb-item active">Ubah Kategori</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('kategori.index') }}" class=" text-decoration-none"><i class="fas fa-arrow-left text-primary"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori.update', ['kategori' => $data['kategori']->kategori_id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                                id="kategori" name="kategori" value="{{ old('kategori', $data['kategori']->kategori) }}" />
                            @error('kategori')
                                <div id="kategoriHelp" class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
