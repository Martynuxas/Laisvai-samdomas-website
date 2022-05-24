<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mokejimas extends Model
{
    use HasFactory;
    protected $table = 'mokejimai';
    public $timestamps = false;
}
