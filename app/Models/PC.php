<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PC extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'available'];
    protected $table = 'pcs';
}
