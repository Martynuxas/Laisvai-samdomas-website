<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nuotrauka extends Model
{
    use HasFactory;
    protected $table = 'nuotraukos';
    public $timestamps = false;
}
