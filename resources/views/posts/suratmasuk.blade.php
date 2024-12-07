@extends('layouts/app')

@section('title', 'Halaman Surat Masuk')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Halaman Surat Masuk</h5>
            <div class="card mb-0">
                <div class="card-body p-4">

                    @if (session('success'))
                        <x-alert></x-alert>
                    @endif

                    <div class="row">
                        <div class="col-8">
                            <a href="{{ route('posts.tambahsm') }}">
                                <x-button color="primary">Tambah Data</x-button>
                            </a>
                        </div>
                        <div class="col-4">
                            <form class="d-flex" action="{{ route('search') }}" method="GET">
                                <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                    aria-label="Search">
                            </form>
                        </div>

                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Tanggal Terima</th>
                                <th scope="col">Pengirim</th>
                                <th scope="col">Perihal</th>
                                <th scope="col">Penerima</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        @php
                            $nomor = ($suratMasuks->currentPage() - 1) * $suratMasuks->perPage() + 1;
                        @endphp
                        <tbody>
                            @if ($suratMasuks->isEmpty())
                                <tr>
                                    <td colspan="8">Tidak ada hasil untuk pencarian Anda.</td>
                                </tr>
                            @else
                                @foreach ($suratMasuks as $suratMasuk)
                                    <tr>
                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                        <td>{{ $nomor++ }}</td>
                                        <td>{{ $suratMasuk->nomor_surat }}</td>
                                        <td>{{ date('d-m-Y', strtotime($suratMasuk->tanggal_terima)) }}</td>
                                        <td>{{ $suratMasuk->pengirim }}</td>
                                        <td>{{ $suratMasuk->perihal }}</td>
                                        <td>{{ $suratMasuk->penerima }}</td>
                                        <td><a href="{{ route('posts.editsm', $suratMasuk->id) }}"><i
                                                    class="fa-solid fa-gear"></i></a></td>
                                        <td>
                                            <a href="#"
                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $suratMasuk->id }}').submit();">
                                                <i class="fa-solid fa-box-archive" style="color: red;"></i>
                                            </a>

                                            <form id="delete-form-{{ $suratMasuk->id }}"
                                                action="{{ route('posts.destroy', $suratMasuk->id) }}" method="POST"
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
                        {{ $suratMasuks->links('pagination::bootstrap-5') }} <!-- Menyesuaikan dengan Bootstrap 5 -->
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
@endsection
