@extends('layouts/app')

@section('title', 'Halaman Surat Keluar')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Surat Keluar</h5>
            <div class="card mb-0">
                <div class="card-body p-4">
                    @if (session('success'))
                        <x-alert></x-alert>
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <a href="/tambah-surat-keluar">
                                <x-button color="primary">Tambah Data</x-button>
                            </a>
                        </div>
                        <div class="col-4">
                            <form class="d-flex" action="{{ route('searchsk') }}" method="GET">
                                <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                    aria-label="Search">
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Tanggal Kirim</th>
                                <th scope="col">Penerima</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Pengirim</th>
                                {{-- <th scope="col">File Surat</th> --}}
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = ($suratKeluars->currentPage() - 1) * $suratKeluars->perPage() + 1;
                        @endphp
                        <tbody>
                            @if ($suratKeluars->isEmpty())
                                <tr>
                                    <td colspan="8">Tidak ada hasil untuk pencarian Anda.</td>
                                </tr>
                            @else
                                @foreach ($suratKeluars as $suratKeluar)
                                    <tr>
                                        <td>{{ $nomor++ }}</td>
                                        <td>{{ $suratKeluar->nomor_surat }}</td>
                                        <td>{{ date('d-m-Y', strtotime($suratKeluar->tanggal_kirim)) }}</td>
                                        <td>{{ $suratKeluar->penerima }}</td>
                                        <td>{{ $suratKeluar->perihal }}</td>
                                        <td>{{ $suratKeluar->pengirim }}</td>
                                        {{-- <td>{{ $suratKeluar->file_surat }}</td> --}}
                                        <td><a href="#"><a href="{{ route('posts.editsk', $suratKeluar->id) }}"><i
                                                        class="fa-solid fa-gear"></i></a>
                                        </td>
                                        <td>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $suratKeluar->id }}').submit();">
                                                <i class="fa-solid fa-box-archive" style="color: red;"></i>
                                            </a>

                                            <form id="delete-form-{{ $suratKeluar->id }}"
                                                action="{{ route('posts.destroysk', $suratKeluar->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation">
                        {{ $suratKeluars->links('pagination::bootstrap-5') }} <!-- Menyesuaikan dengan Bootstrap 5 -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection
