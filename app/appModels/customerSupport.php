<?php

namespace App\appModels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class customerSupport extends Model
{
    protected $fillable=['co_id','user_id','message','subject','senderType'];

    public static function saveMessage(Request $request, $co_id){

        $user = \App\appModels\User::where('email','=',htmlspecialchars(trim($request->to)))->first();
        customerSupport::create([
            'co_id'=>$co_id,
            'user_id'=>$user->id,
            'message'=>htmlspecialchars(trim($request->message)),
            'subject'=>htmlspecialchars(trim($request->subject)),
            'senderType'=>0
        ]);
    }

    public static function getSentMessages($co_id){

        return DB::table('customer_supports')->join
        ('users','customer_supports.user_id',
            '=','users.id')->
        select(['customer_supports.*','users.name','users.email'])
            ->where('customer_supports.co_id','=',$co_id)
            ->where('customer_supports.senderType','=',0)
            ->orderBy('customer_supports.created_at','desc')->paginate(10);
    }

    public static function getInboxMessages($co_id){

        return DB::table('customer_supports')->join
        ('users','customer_supports.user_id',
            '=','users.id')->
        select(['customer_supports.*','users.name','users.email'])
            ->where('customer_supports.co_id','=',$co_id)
            ->where('customer_supports.senderType','=',1)
            ->orderBy('customer_supports.created_at','desc')->paginate(10);
    }

    public static function deleteMessage($id){
        customerSupport::where('id','=',$id)->delete();
    }

}
