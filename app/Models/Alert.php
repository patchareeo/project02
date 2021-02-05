<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount' , 'detail'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts() {
  
        return $this->hasMany(Post::class );
     
    }

    public function Alert() {
  
        return $this->hasMany(Alert::class ,'alerts_id');
     
    }


}
