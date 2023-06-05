<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kerusakan extends Model
{
    use HasFactory;
    protected $table = 'kerusakan';
    public $incrementing = false;
    protected $keytype = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'nama', 'deskripsi', 'tutorial_id'];
    public function gejala()
    {
        return $this->belongsToMany(gejala::class, 'aturan', 'id_rusak', 'id_gejala');
    }
}
