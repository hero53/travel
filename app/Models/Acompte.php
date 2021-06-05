<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompte extends Model
{
    use HasFactory;

    public $fillable = [ 
            'avance',
            'modereglement',
            'datereglement',
            'user_id'
        ];

      public function client(){
        return $this->belongsTo(Client::class);
    }
}
