<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenumerata extends Model
{
    use HasFactory;
    protected $table = 'prenumeratos';
    public $timestamps = false;
    public function kategorijos()
    {
        return $this->hasOne('App\Models\Kategorija', 'id', 'kategorijos_id');
    }
}
