<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kodeakun extends Model
{
    public $table = 'm_kode_akun';
    protected $primaryKey = 'kode_akun';
    public $timestamps = false;

    protected $fillable = [
        'kode_akun', 'nama_akun', 'tabel_bantuan','pos_saldo','pos_laporan','debit','kredit', 'kategori'
    ];
}
