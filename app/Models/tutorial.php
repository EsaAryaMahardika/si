<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutorial extends Model
{
    use HasFactory;
    protected $table = 'tutorial';
    public $timestamps = false;
    protected $fillable = ['nama', 'file'];
}
