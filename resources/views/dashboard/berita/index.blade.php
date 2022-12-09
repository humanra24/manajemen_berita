@extends('dashboard.base')

@section('content')
    <div class="row align-items-center mb-3">
        <div class="col-12 col-md-6">
            <h1 class="mt-4">{{ $data['title'] }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active">Berita</li>
            </ol>
        </div>
        <div class="col-12 col-md-6 text-md-end">
            <a class="btn btn-primary" href="{{ route('berita.create') }}">Tambah Berita</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Berita</th>
                            <th>Kategori</th>
                            <th>Dibuat</th>
                            <th>Diubah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data['berita'] as $berita)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $berita->judul_berita }}</td>
                                <td>{{ $berita->kategori->kategori ?? 'data tidak ada' }}</td>
                                </td>
                                <td>{{ $berita->created_at }}</td>
                                </td>
                                <td>{{ $berita->updated_at }}</td>
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-success me-2"
                                        href="{{ route('berita.show', ['beritum' => $berita->berita_id]) }}">Detail</a>
                                    <a class="btn btn-warning me-2"
                                        href="{{ route('berita.edit', ['beritum' => $berita->berita_id]) }}">Ubah</a>
                                    <a class="btn btn-danger" href="#" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal"
                                        data-bs-berita="{{ route('berita.destroy', ['beritum' => $berita->berita_id]) }}">Hapus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3>Yakin hapus data ini?</h3>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        const hapusModal = document.getElementById('hapusModal')
        hapusModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const berita = button.getAttribute('data-bs-berita')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalBodyInput = hapusModal.querySelector('form')

            modalBodyInput.setAttribute('action', berita)
        })
    </script>
@endpush
