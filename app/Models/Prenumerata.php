<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenumerata extends Model
{
    use HasFactory;
    protected $table = 'prenumerata';
    public function kategorijos()
    {
        return $this->hasOne('App\Models\Kategorija', 'id', 'kategorijos_id');
    }
}
