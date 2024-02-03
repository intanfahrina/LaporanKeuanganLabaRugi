<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inputjurnal extends Model
{
    public $table = 't_jurnal_umum';
    protected $primaryKey = 'id_jurnal_umum';
    public $timestamps = false;

    protected $fillable = [
        'id_jurnal_umum', 'tanggal', 'no_bukti', 'keterangan', 'kode_akun', 'kode_akun_bantu', 'debit', 'kredit'
    ];
}
