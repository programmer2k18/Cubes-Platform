<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{

    use HasApiTokens, Notifiable;

    public function reviews(){
        return $this->hasMany('App\appModels\co_reviews','user_id');
    }
}
