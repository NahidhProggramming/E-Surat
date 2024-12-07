<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $primarykey = 'id';
    protected $table = 'surat_masuk'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['nomor_surat', 'tanggal_terima', 'pengirim', 'perihal', 'penerima'];
}

