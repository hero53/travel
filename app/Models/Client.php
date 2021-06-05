<?php

namespace App\Models;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

  public $fillable = ['name','telephone','email','passeport','user_id','destination_id'];
  
    public function destination(){
        return $this->belongsTo(Destination::class);
    }

    public function billets(){
        return $this->hasMany(Billet::class,'client_id');
    }

     public function acompts(){
        return $this->hasMany(Acompte::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
