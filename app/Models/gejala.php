<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    public $incrementing = false;
    protected $keytype = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'keterangan'];
    public function crash()
    {
        return $this->belongsToMany(kerusakan::class, 'aturan', 'id_gejala', 'id_rusak');
    }
}
