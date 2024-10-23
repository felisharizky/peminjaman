<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pinjam_id',
        'tanggal_kembali',
        'status'
    ];

    public function pinjam()
    {
        return $this->belongsTo(Pinjam::class);
    }
}
