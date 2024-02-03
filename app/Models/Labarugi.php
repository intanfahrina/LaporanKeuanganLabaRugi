<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Labarugi extends Model
{
    public $table = 'laba_rugi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'pajak_pph'
    ];
}
