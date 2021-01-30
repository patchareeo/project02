<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'amount' , 'detail' ,'slug','date','time'
    ];
}
