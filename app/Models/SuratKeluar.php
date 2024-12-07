<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'surat_keluar'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['nomor_surat', 'tanggal_kirim', 'penerima', 'perihal', 'pengirim'];
}

