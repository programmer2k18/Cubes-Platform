<?php

namespace App\appModels;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\ImageHandeller;
use Illuminate\Support\Facades\DB;

class co_seating_desks extends Model
{
    protected $fillable =['co_id','type','description','image','capacity',
        'price','currency','pricePeriodType'];

    /**
     * @param Request $request
     */

    public static function AddAsset(Request $request){

        $folderPath = ImageHandeller::makeDirectory('Coworking Assets/'.$request->input('type'));
        co_seating_desks::create([
            'co_id'=>$request->session()->get('admin')->id,
            'type'=>$request->input('type'),
            'description'=>htmlspecialchars(trim($request->input('description'))),
            'capacity'=>$request->input('capacity'),
            'price'=>$request->input('price'),
            'currency'=>$request->input('currency'),
            'pricePeriodType'=>$request->input('pricePeriod'),
            'image'=>ImageHandeller::saveImage($request,$folderPath)
        ]);
    }

    public static function getAssetsByType($type){

            return DB::table('co_seating_desks')->
            where('co_id','=',request()->session()->get('admin')->id)
                ->where('type','=',$type)->
                latest()->paginate(6);
    }

    public static function getAssetById($id){
        return co_seating_desks::where('id','=',$id)->
        where('co_id','=',request()->session()->get('admin')->id)->first();
    }

    public static function getPlaceAssets($co_id){

        return co_seating_desks::where('co_id','=',$co_id)->orderBy('type')->get();
    }

    public static function editCoworkingAsset(Request $request, $id){

        if($request->hasFile('image')){
            $folderPath = ImageHandeller::makeDirectory('Coworking Assets/'.$request->input('type'));
            co_seating_desks::where('id','=',$id)->
            where('co_id','=',$request->session()->get('admin')->id)->update([
                'type'=>$request->input('type'),
                'description'=>htmlspecialchars(trim($request->input('description'))),
                'capacity'=>$request->input('capacity'),
                'price'=>$request->input('price'),
                'pricePeriodType'=>$request->input('pricePeriod'),
                'image'=>ImageHandeller::saveImage($request,$folderPath)
            ]);

        }else{
            co_seating_desks::where('id','=',$id)->
            where('co_id','=',$request->session()->get('admin')->id)->update([
                'type'=>$request->input('type'),
                'description'=>htmlspecialchars(trim($request->input('description'))),
                'capacity'=>$request->input('capacity'),
                'price'=>$request->input('price'),
                'pricePeriodType'=>$request->input('pricePeriod'),
            ]);
        }
    }

    public static function deleteAsset(Request $request){

        $asset = DB::table('co_seating_desks')->
        where('id','=',$request->id)->first();

        ImageHandeller::deleteImage($asset->image);

        DB::table('co_seating_desks')->
        where('id','=',$request->id)->delete();
    }
}
