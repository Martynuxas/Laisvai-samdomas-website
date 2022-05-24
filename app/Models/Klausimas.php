<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klausimas extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $table = 'klausimynai';
    public $timestamps = false;
}
