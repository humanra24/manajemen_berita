@extends('dashboard.base')

@section('content')
    <h1 class="mt-4">{{ $data['title'] }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
        <li class="breadcrumb-item active">Detail Berita</li>
    </ol>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('berita.index') }}" class=" text-decoration-none"><i
                            class="fas fa-arrow-left text-primary"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <h3 class="text-center">{{ $data['berita']->judul_berita }}</h3>
                    <p>{{ $data['berita']->isi_berita }}</p>
                    <div class="fs-6">Dibuat: {{ $data['berita']->created_at }}</div>
                    <div class="fs-6">Diubah: {{ $data['berita']->updated_at }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
