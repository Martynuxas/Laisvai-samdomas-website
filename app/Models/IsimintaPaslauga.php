<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vartotojai;

class IsimintaPaslauga extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'isimintospaslaugos';
    public $timestamps = false;
    public function paslaugos()
    {
        return $this->belongsTo('App\Models\Skelbimas', 'isimintosPaslaugosId');
    }
}
