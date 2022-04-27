<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konkursas extends Model
{
    use HasFactory;
    protected $table = 'konkursas';
    public $timestamps = false;

    public function kategorijos()
    {
        return $this->hasOne('App\Models\Kategorija', 'id', 'kategorija');
    }
}
