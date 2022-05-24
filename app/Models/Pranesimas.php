<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pranesimas extends Model
{
    use HasFactory;
    protected $table = 'pranesimai';
    public $timestamps = false;
}
