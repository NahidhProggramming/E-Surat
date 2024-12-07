<?php

namespace App\Http\Controllers;

use App\Exports\SuratKeluarExport;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Maatwebsite\Excel\Facades\Excel;

class SuratKeluarController extends Controller
{
    public function export()
    {
        return Excel::download(new SuratKeluarExport, 'surat_keluar.xlsx');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Gunakan paginate() alih-alih get() untuk pagination
        $suratKeluars = SuratKeluar::where('nomor_surat', 'LIKE', "%$query%")
                                ->orWhere('penerima', 'LIKE', "%$query%")
                                ->orWhere('perihal', 'LIKE', "%$query%")
                                ->orWhere('pengirim', 'LIKE', "%$query%")
                                ->paginate(5); // Menampilkan 10 data per halaman

        return view('posts.suratkeluar', compact('suratKeluars'));
    }
    // Menampilkan daftar surat masuk
    public function view()
    {
        $suratKeluars = SuratKeluar::orderBy('tanggal_kirim', 'desc')->paginate(5);
        return view('posts.suratkeluar', compact('suratKeluars'));
    }

    public function add()
    {
        return view('posts.tambahsk');
    }

    public function submit(Request $request)
    {
        // Validasi data
        $request->validate([
            'nomor_surat' => 'required|nullable|string|max:255',
            'tanggal_kirim' => 'required|date',
            'penerima' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'pengirim' => 'required|string|max:255',
        ],
        [
            'nomor_surat.required' => 'Nomor Surat tidak boleh kosong.',
            'tanggal_kirim.required' => 'Tanggal Kirim wajib diisi.',
            'penerima.required' => 'Penerima tidak boleh kosong.',
            'perihal.required' => 'Perihal tidak boleh kosong.',
            'pengirim.required' => 'Pengirim tidak boleh kosong.',
        ]);

        // Proses penyimpanan data
        $suratKeluar = new SuratKeluar();
        $suratKeluar->nomor_surat = $request->nomor_surat;
        $suratKeluar->tanggal_kirim = $request->tanggal_kirim;
        $suratKeluar->penerima = $request->penerima;
        $suratKeluar->perihal = $request->perihal;
        $suratKeluar->pengirim = $request->pengirim;

        // Simpan data ke database
        $suratKeluar->save();

        // Redirect dengan pesan sukses
        return redirect()->route('posts.suratkeluar')->with('success', 'Surat Keluar berhasil disimpan.');
    }
    public function edit($id)
    {
        $suratKeluars = SuratKeluar::findOrFail($id);
        return view('posts.editsk', compact('suratKeluars'));
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

        $suratKeluars = SuratKeluar::findOrFail($id);
        $suratKeluars->update($request->all());

        return redirect()->route('posts.suratkeluar')->with('success', 'Surat Keluar Berhasil di Update!');
    }
    public function destroy($id)
    {
        // Cari surat berdasarkan ID atau nomor_surat
        $suratKeluars = SuratKeluar::findOrFail($id);

        // Hapus surat tersebut
        $suratKeluars->delete();

        // Redirect atau berikan respon setelah penghapusan
        return redirect()->route('posts.suratkeluar')->with('success', 'Surat Keluar berhasil dihapus.');
    }

}
