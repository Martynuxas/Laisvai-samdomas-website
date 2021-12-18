<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenumerata extends Model
{
    use HasFactory;
    protected $table = 'prenumerata';
    public $timestamps = false;
    public function kategorijos()
    {
        return $this->hasMany('App\Models\Isiminti', 'id', 'vartotojo_id');
    }
}
