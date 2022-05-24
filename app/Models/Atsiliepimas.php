<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atsiliepimas extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'atsiliepimai';
    public $timestamps = false;

    public function userKomentavo()
    {
        return $this->belongsTo('App\Models\User', 'kas_komentavo');
    }
}
