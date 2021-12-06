<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vartotojai;

class Isiminti extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'Isiminti';
    public function isiminti()
    {
        return $this->hasMany(Isiminti::class);
    }
}
