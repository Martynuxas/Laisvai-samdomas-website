<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzklausa extends Model
{
    use HasFactory;
    protected $table = 'uzklausa';
    public $timestamps = false;
    public function kategorijos()
    {
        return $this->hasOne('App\Models\Kategorija', 'id', 'kategorija');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'vartotojo_id');
    }
}
