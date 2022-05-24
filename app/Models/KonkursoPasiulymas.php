<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonkursoPasiulymas extends Model
{
    use HasFactory;
    protected $table = 'konkursuPasiulymai';
    public $timestamps = false;
    public function vartotojas()
    {
        return $this->hasOne('App\Models\User', 'id', 'vartotojo_id');
    }
}
