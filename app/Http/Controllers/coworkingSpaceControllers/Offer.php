<?php

namespace App\Http\Controllers\coworkingSpaceControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Middleware\AuthCoworking;

class Offer extends Controller
{
    public function __construct(){
        $this->middleware('AuthCoworking');
    }

    // get general offer form to add one.
    public function addOfferForm($user_id=null){
        if ($user_id)
            \request()->session()->put('userOffer',$user_id);
        return view('dashboard.offers.addOffer');
    }

    public function addOffer(Request $req, $user_id = 0){
        $this->validateOfferInputs($req);
        if($this->ckeckFromToDateLogic($req)){
            $response = \App\appModels\offers::addNewOffer($req, $user_id);
            if($response){
                return $user_id ? $this->clearCustomizedOffersCache('Added'):
                                  $this->clearGeneralOffersCache('Added');
            }
        }
        return redirect()->back()->with('msg','Starting time must be before Ending Time')
            ->withInput($req->all());
    }

    //@return general offers for public users
    public function generalOffers(){
        $generalOffers = Cache::rememberForever('generalOffers:'.$this->getCO_ID(), function (){
           return \App\appModels\offers::generalOffers($this->getCO_ID()); 
        });
        return view('dashboard.offers.generalOffers')->with('offers',$generalOffers);
    }

    //@return customized  offers
    public function customizedOffers(){
        $customizedOffers = Cache::rememberForever('customizedOffers:'.$this->getCO_ID(), function (){
            return \App\appModels\offers::customizedOffers($this->getCO_ID());
        });
        return view('dashboard.offers.customizedOffers')->with('offers',$customizedOffers);
    }
    // select users to select and send offers
    public function getPeopleToSendOffers($order ='desc'){
        $users = null;
        if ($order == 'asc')
            $users = \App\appModels\offers::getLoyalUsersToUpgrade($this->getCO_ID(),'asc');
        else if ($order == 'desc')
            $users = \App\appModels\offers::getLoyalUsersToUpgrade($this->getCO_ID(),'desc');
        else if ($order == 'neverBooked')
            $users = \App\appModels\offers::getNeverBookedUsersToUpgrade($this->getCO_ID());
        else if ($order == 'nearestUsers')
            $users = \App\appModels\offers::selectNearestUsersToUpgrade();
        else
            return redirect()->back()->with('msg','Invalid Request');
        return view('dashboard.offers.getDesiredUsers',['users'=>$users, 'order'=>$order]);
    }
    //edit offer form whether it is general or customized offer
    public function getEditOfferForm($offer_id){

        $offer = \App\appModels\offers::getOfferById($offer_id);
        return view('dashboard.offers.editOffer')->with('offer',$offer);
    }
     
    //edit offer whether it is general or customized 
    public function editOffer(Request $req, $offer_id){
        $this->validateOfferInputs($req);
        if($this->ckeckFromToDateLogic($req)){
            $status = \App\appModels\offers::updateOffer($req,$offer_id);
            if ($status){
                return $req->uid?$this->clearCustomizedOffersCache('Updated'):
                          $this->clearGeneralOffersCache('Updated');
            }
            return redirect()->back()->with('msg','Something went wrong, Please try again')
                ->withInput($req->all());
        }
        return redirect()->back()->with('msg','Starting time must be before Ending Time')
            ->withInput($req->all());
    }

    //end available offer whether it is general or customized offer
    public function closeOffer($offer_id){
         $status = \App\appModels\offers::closeOffer($offer_id);
         if ($status) {
             Cache::forget('generalOffers:'.$this->getCO_ID());
             Cache::forget('customizedOffers:'.$this->getCO_ID());
             return redirect()->back()->with('added_msg','Offer Closed Successfully.');
         }
         return redirect()->back()->with('msg','Something went wronge, Please try again.');
    }

    private function clearGeneralOffersCache($message){
        Cache::forget('generalOffers:'.$this->getCO_ID());
        return redirect(route('generalOffers'))->with('added_msg','Offer '.$message.' successfully');
    }

    private function clearCustomizedOffersCache($message){
        Cache::forget('customizedOffers:'.$this->getCO_ID());
        \request()->session()->forget('userOffer');
        return redirect(route('customizedOffers'))->with('added_msg','Offer '.$message.' successfully');
    }

    private function getCO_ID(){
        return \request()->session()->get('admin')->id;
    }
    
    protected function validateOfferInputs(Request $req)
    {
        $this->validate($req,[
            'from'=>'required|date',
            'to'=>'required|date',
            'type'=>'required|string',
            'description'=>'required|string',
            'discount'=>'required|numeric|integer|between:1,100'
        ]);
    }

    protected function ckeckFromToDateLogic(Request $req){
      return $req->to > $req->from? true:false;     
    }
}
