<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planas extends Model
{
    use HasFactory;
    protected $table = 'kainu_planai';
    public $timestamps = false;
}
