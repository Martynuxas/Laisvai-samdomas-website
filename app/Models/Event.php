<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'Events';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'title', 'start', 'end'
    ];
}