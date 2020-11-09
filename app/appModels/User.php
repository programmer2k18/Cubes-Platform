<?php

namespace  App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use  Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reviews(){
        return $this->hasMany('App\appModels\co_reviews','user_id');
    }
    public static function allUsers(){
        return User::paginate(15);
    }
}
