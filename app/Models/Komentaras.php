<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentaras extends Model
{
    use HasFactory;
    protected $table = 'komentarai';
    public $timestamps = false;
    public function userKomentavo()
    {
        return $this->belongsTo('App\Models\User', 'vartotojo_id');
    }
}
