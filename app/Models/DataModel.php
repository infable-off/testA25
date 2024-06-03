<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    protected $table = 'sell_post';
    protected $fillable = ['id','name', 'model','engine','vin','price','image','user_id'];
}
