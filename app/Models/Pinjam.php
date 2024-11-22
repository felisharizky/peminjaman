<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $fillable = [
        'pc_id', 
        'kelengkapan',
        'tanggalPinjam', 
        'tanggalKembali',
        'user_id',
    ];
    // protected $table = 'pinjams';

    protected $casts =[
        'kelengkapan' => 'array',
    ];

    public function pc() // Tambahkan relasi ke model PC
    {
        return $this->belongsTo(PC::class, 'pc_id');
    }

        public function konfirmasi()
    {
        return $this->hasOne(Konfirmasi::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
