<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ivertinimas extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'ivertinimai';
    public $timestamps = false;
}
