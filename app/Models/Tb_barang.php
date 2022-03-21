<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'jumlah',
        'harga',
        'created_at',
        'updated_at',
    ];
}
