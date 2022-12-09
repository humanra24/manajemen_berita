@extends('dashboard.base')

@section('content')
    <h1 class="mt-4">{{ $data['title'] }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/kategori">Kategori</a></li>
        <li class="breadcrumb-item active">Detail Kategori</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('kategori.index') }}" class=" text-decoration-none"><i
                            class="fas fa-arrow-left text-primary"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $data['kategori']->kategori }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label">Created At</label>
                        <input type="text" class="form-control" id="createdAt" name="kategori" value="{{ $data['kategori']->created_at }}" disabled />
                    </div>
                    <div class="mb-3">
                        <label for="updated_at" class="form-label">Updated At</label>
                        <input type="text" class="form-control" id="updatedAt" name="kategori" value="{{ $data['kategori']->updated_at }}" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
