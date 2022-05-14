<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'user_id',
    ];


    public function user(){
        $this->belongsTo(User::class);
    }
    public function pictures(){
      return  $this->hasMany(picture::class);
    }
}
