<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;
    protected $table = 'provinsi';
    public $incrementing = false;
    protected $keytype = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'nama'];
    public function kab()
    {
        return $this->hasMany(kabupaten::class, 'id_prov');
    }
    public function teknisi()
    {
        return $this->hasMany(teknisi::class, 'id_prov');
    }
}
