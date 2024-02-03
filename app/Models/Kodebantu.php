<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kodebantu extends Model
{
    public $table = 'm_kode_bantu';
    protected $primaryKey = 'kode_akun_bantu';
    public $timestamps = false;

    protected $fillable = [
        'kode_akun_bantu', 'nama_akun_bantu', 'kategori', 'saldo_normal','tabel_bantuan','saldo_awal'
    ];
}
