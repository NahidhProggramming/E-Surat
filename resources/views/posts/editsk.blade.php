@extends('layouts/app')

@section('title', 'Halaman Edit Surat Keluar')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Edit Surat Keluar</h5>
            <div class="card mb-0">
                <form action="{{ route('posts.update', $suratKeluars->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="input" class="form-control" id="nomor_surat" name="nomor_surat"
                            value="{{ $suratKeluars->nomor_surat }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                        <input type="date" class="form-control" id="tanggal_terima"
                            value="{{ $suratKeluars->tanggal_kirim }}" name="tanggal_kirim" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerima" class="form-label">Penerima</label>
                        <input type="input" class="form-control" id="penerima" name="penerima"
                            value="{{ $suratKeluars->penerima }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="input" class="form-control" id="perihal" name="perihal"
                            value="{{ $suratKeluars->perihal }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengirim" class="form-label">Pengirim</label>
                        <input type="input" class="form-control" id="pengirim" name="pengirim"
                            value="{{ $suratKeluars->pengirim }}" required>
                    </div>

                    <div class="d-grid gap-2 d-md-block">
                        <x-button color="success">Simpan</x-button>
                        <a href="{{ route('posts.suratkeluar') }}" class="btn btn-outline-danger" type="button">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
