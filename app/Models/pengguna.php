<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    public $timestamps = false;
    protected $fillable = ['nama', 'telp', 'id_prov', 'id_kab'];
}
