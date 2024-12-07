@extends('layouts/app')

@section('title', 'Halaman Tambah Surat Masuk')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Tambah Surat Masuk</h5>
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ada kesalahan!</strong> Harap periksa data yang Anda masukkan.
                    <ul class="mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="card mb-0">
                <form action="{{ route('posts.submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="input" class="form-control" id="nomor_surat" name="nomor_surat"
                            placeholder="Isi Nomor Surat">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima">
                    </div>
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="input" class="form-control" id="pengirim" name="pengirim"
                            placeholder="Isi Pengirim">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="input" class="form-control" id="perihal" name="perihal" placeholder="Isi Perihal">
                    </div>
                    <div class="mb-3">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="input" class="form-control" id="penerima" name="penerima"
                            placeholder="Isi Penerima">
                    </div>

                    <div class="d-grid gap-2 d-md-block">
                        <x-button color="primary">Simpan</x-button>
                        <a href="{{ route('posts.suratmasuk') }}" class="btn btn-outline-danger" type="button">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
