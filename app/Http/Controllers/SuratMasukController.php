<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Exports\SuratMasukExport;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function export()
    {
        return Excel::download(new SuratMasukExport, 'surat_masuk.xlsx');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Gunakan paginate() alih-alih get() untuk pagination
        $suratMasuks = SuratMasuk::where('nomor_surat', 'LIKE', "%$query%")
                                ->orWhere('nomor_surat', 'LIKE', "%$query%")
                                ->orWhere('pengirim', 'LIKE', "%$query%")
                                ->orWhere('perihal', 'LIKE', "%$query%")
                                ->orWhere('penerima', 'LIKE', "%$query%")
                                ->paginate(5); // Menampilkan 10 data per halaman

        return view('posts.suratmasuk', compact('suratMasuks'));
    }
    // Menampilkan daftar surat masuk
    public function view()
    {
        $suratMasuks = SuratMasuk::orderBy('tanggal_terima', 'desc')->paginate(5);
        return view('posts.suratmasuk', compact('suratMasuks'));
    }

    // Menampilkan form tambah surat masuk
    public function add()
    {
        return view('posts.tambahsm');
    }

    public function submit(Request $request)
    {
        // Validasi data
        $request->validate([
            'nomor_surat' => 'required|nullable|string|max:255',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
        ],
        [
            'nomor_surat.required' => 'Nomor Surat tidak boleh kosong.',
            'tanggal_terima.required' => 'Tanggal Terima wajib diisi.',
            'pengirim.required' => 'Pengirim tidak boleh kosong.',
            'perihal.required' => 'Perihal tidak boleh kosong.',
            'penerima.required' => 'Penerima tidak boleh kosong.',
        ]);

        // Proses penyimpanan data
        $suratMasuk = new SuratMasuk();
        $suratMasuk->nomor_surat = $request->nomor_surat;
        $suratMasuk->tanggal_terima = $request->tanggal_terima;
        $suratMasuk->pengirim = $request->pengirim;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->penerima = $request->penerima;

        // Simpan data ke database
        $suratMasuk->save();

        // Redirect dengan pesan sukses
        return redirect()->route('posts.suratmasuk')->with('success', 'Surat masuk berhasil disimpan.');
    }
    public function edit($id)
    {
        $suratMasuks = SuratMasuk::findOrFail($id);
        return view('posts.editsm', compact('suratMasuks'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'nullable|string|max:255',
            'tanggal_terima' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
        ]);

        $suratMasuks = SuratMasuk::findOrFail($id);
        $suratMasuks->update($request->all());

        return redirect()->route('posts.suratmasuk')->with('success', 'Surat Masuk Berhasil di Update!');
    }
    public function destroy($id)
    {
        // Cari surat berdasarkan ID atau nomor_surat
        $suratMasuks = Suratmasuk::findOrFail($id);

        // Hapus surat tersebut
        $suratMasuks->delete();

        // Redirect atau berikan respon setelah penghapusan
        return redirect()->route('posts.suratmasuk')->with('success', 'Surat Masuk berhasil dihapus.');
    }

}
