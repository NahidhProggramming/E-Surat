@extends('layouts/app')

@section('title', 'Halaman Surat Masuk')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Download & Rekap Data</h5>
            <div class="card mb-0">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-4">
                            <h6>Rekap Surat Masuk</h6>
                            <a href="{{ route('suratmasuk.export') }}">
                                <x-button color="primary">Download</x-button>
                            </a>
                        </div>
                        <div class="col-6">
                            <h6>Template Surat Masuk</h6>
                            <a href="#">
                                <x-button color="primary">Download</x-button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-4">
                            <h6>Rekap Surat Keluar</h6>
                            <a href="{{ route('suratkeluar.export') }}">
                                <x-button color="primary">Download</x-button>
                            </a>
                        </div>
                        <div class="col-6">
                            <h6>Template Surat Keluar</h6>
                            <a href="#">
                                <x-button color="primary">Download</x-button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection
