<?php
namespace App\Exports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SuratMasukExport implements FromCollection, WithHeadings, WithStyles, WithEvents
{
    /**
     * Ambil data yang akan diexport
     */
    public function collection()
    {
        // Tambahkan nomor urut
        $suratMasuks = SuratMasuk::select('nomor_surat', 'tanggal_terima', 'pengirim', 'perihal', 'penerima')->get();
        $suratMasuks->map(function ($surat, $key) {
            $surat->nomor = $key + 1; // Nomor urut
            return $surat;
        });
        return $suratMasuks;
    }

    /**
     * Buat heading untuk file Excel
     */
    public function headings(): array
    {
        return [
            'No',             // Heading untuk nomor urut
            'Nomor Surat',
            'Tanggal Terima',
            'Pengirim',
            'Perihal',
            'Penerima',
        ];
    }

    /**
     * Tambahkan style untuk header dan border
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1    => ['font' => ['bold' => true]],

            // Border untuk semua cell yang ada data
            'A1:F100' => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Event untuk auto-size column dan mengatur nomor urut
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Mengatur auto-size untuk semua kolom
                foreach (range('A', 'F') as $col) {
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}