<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzsakymas extends Model
{
    use HasFactory;
    protected $table = 'uzsakymai';
    public $timestamps = false;
    public function specialistai()
    {
        return $this->belongsTo('App\Models\User', 'specialisto_id');
    }
    public function uzsakovai()
    {
        return $this->belongsTo('App\Models\User', 'uzsakovo_id');
    }
    public function progresai()
    {
        return $this->belongsTo('App\Models\Progresas', 'progresas');
    }

}
