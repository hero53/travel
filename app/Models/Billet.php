<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;

   public $fillable = ['depare','arriver','client_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
