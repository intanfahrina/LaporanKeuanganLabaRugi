<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    public $table = 'm_karyawan';
    protected $primaryKey = 'id_karyawan';
    public $timestamps = false;

    protected $fillable = [
        'id_karyawan', 'id_jabatan', 'nama_karyawan', 'email', 'telepon', 'tgl_mulai_bekerja', 'tgl_selesai_bekerja'
    ];
}
