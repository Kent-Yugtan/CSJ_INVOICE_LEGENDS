<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory,Notifiable;

   
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }
}