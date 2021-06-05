<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    public  $fillable = ['pays','ville'];

     public function clients(){
        return $this->hasMany(Client::class);
    }
}
