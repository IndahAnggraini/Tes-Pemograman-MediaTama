<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_chart',
        'id_barang',
        'jumlah',
        'total_harga',
        'created_at',
        'updated_at',
    ];
}
