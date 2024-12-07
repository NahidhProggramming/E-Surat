@extends('layouts/app')

@section('title', 'Halaman Edit Surat Masuk')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Edit Surat Masuk</h5>
            <div class="card mb-0">
                <form action="{{ route('posts.update', $suratMasuks->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="input" class="form-control" id="nomor_surat" name="nomor_surat"
                            value="{{ $suratMasuks->nomor_surat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima"
                            value="{{ $suratMasuks->tanggal_terima }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="input" class="form-control" id="pengirim" name="pengirim"
                            value="{{ $suratMasuks->pengirim }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="input" class="form-control" id="perihal" name="perihal"
                            value="{{ $suratMasuks->perihal }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="input" class="form-control" id="penerima" name="penerima"
                            value="{{ $suratMasuks->penerima }}" required>
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <x-button color="success">Simpan</x-button>
                        <a href="{{ route('posts.suratmasuk') }}" class="btn btn-outline-danger" type="button">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="libs/simplebar/dist/simplebar.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
@endsection
