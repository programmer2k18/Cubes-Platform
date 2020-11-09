<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class co_reviews extends Model
{
    protected $fillable = ['co_id','user_id','user_name','wifi','overall','review',
                           'location','comfort'];
    protected $guarded=['id'];

    public static function getAllReviews($co_id){

        return DB::table('co_reviews')->join
        ('users','co_reviews.user_id','=','users.id')->
        select(['co_reviews.*','users.image','users.email'])
            ->where('co_reviews.co_id','=',$co_id)
            ->orderBy('co_reviews.created_at','DESC')->get();
    }

    public static function deleteReview($id){
        DB::table('co_reviews')->where('id','=',$id)->delete();
    }

    public function reviewOwner(){
        return $this->belongsTo('App\appModels\User','user_id');
    }
}
