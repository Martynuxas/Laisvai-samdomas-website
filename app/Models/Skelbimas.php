<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skelbimas extends Model
{
    use HasFactory;
    protected $table = 'Skelbimai';
    public $timestamps = false;
    public function kategorijos()
    {
        return $this->hasOne('App\Models\Kategorija', 'id', 'kategorijos_id');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'vartotojo_id');
    }
    public function statusai()
    {
        return $this->hasOne('App\Models\Statusas', 'id', 'statuso_id');
    }
}
