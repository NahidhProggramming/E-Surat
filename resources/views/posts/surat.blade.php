@extends('layouts/app')

@section('title', 'Halaman Buat Surat')

@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Kop Surat -->
            <div class="text-center">
                <img src="{{ asset('logo.png') }}" alt="Logo" style="width: 100px;">
                <h3>KOPERASI KARYAWAN MITRA ENERGI SEJAHTERA</h3>
                <p>Jl. Contoh No. 123, Jakarta Selatan, Indonesia</p>
                <p>Telepon: (021) 12345678 | Email: info@koperasi.com</p>
                <hr>
            </div>

            <!-- Isi Surat -->
            <div class="content mt-4">
                <h4>Nomor Surat : </h4>
                <h4>Lampiran    : </h4>
                <h4>Perihal     : </h4>
                {{-- <h4>Nomor Surat: {{ $nomor_surat }}</h4> --}}
                {{-- <p>{{ $isi_surat }}</p> --}}
            </div>

            <!-- Tanda Tangan -->
            <div class="text-end mt-5">
                <p>Hormat Kami,</p>
                <br><br>
                <p><strong>(Nama Penandatangan)</strong></p>
            </div>

            <!-- Tombol Print -->
            <div class="text-end mt-4">
                <button class="btn btn-primary" onclick="window.print()">Print Surat</button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
