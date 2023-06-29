<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    public $timestamps = false;
    public $guarded = [];
    function crash() {
        return $this->belongsTo(kerusakan::class, 'id_rusak', 'id');
    }
}
