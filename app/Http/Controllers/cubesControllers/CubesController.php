<?php

namespace App\Http\Controllers\cubesControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\appModels\coworkingSpace;

class CubesController extends Controller
{
    public function CubesProfile(){
        return view('cubesDashboard.cubesProfile.profile');
    }

    public function getActivatedCoWorkingSpaces(){
        $activeSpaces = coworkingSpace::activeCoworkingSpaces();
        return view('cubesDashboard.cubesDashboard')->with('co_spaces',$activeSpaces);
    }

    public function getPendingCoWorkingSpaces(){
        $pendingSpaces = coworkingSpace::pendingCoworkingSpaces();
        return view('cubesDashboard.cubesDashboard')->with('co_spaces',$pendingSpaces);
    }

    public function activateCo_WorkingSpace($co_id){

        $coSpace = coworkingSpace::activateCoworkingSpace($co_id);
        $this->sendActivationEmail($coSpace);
        return redirect(route('activeSpaces'))->with('added_msg',$coSpace->name.
            ' Co-working space is activated successfully.');
    }

    public function sendActivationEmail($co_working_space){
        Notification::route('mail',$co_working_space->email)
        ->notify( new \App\Notifications\ActivateCoWorkingSpace($co_working_space));
    }

}

