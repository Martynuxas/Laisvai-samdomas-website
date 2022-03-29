<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vartotojai;

class IsimintasVartotojas extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'isimintasvartotojas';
    public $timestamps = false;
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'isimintoVartotojoId');
    }
}
