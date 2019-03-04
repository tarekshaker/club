<?php

namespace App\Http\Controllers\API;

use App\Booking;
use App\Session;
use App\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function getAllSessions(){
        $sessions = Session::all();
        return response()->json($sessions);
    }

    public function getSessionsSortedBySport(){
        $sessions = Session::all()->groupBy('sport_id');
        return response()->json($sessions);
    }

    public function getSessionsOfSport($id){
        $sessions = Session::where('sport_id',$id)->get();
        return response()->json($sessions);
    }

    public function getAvailableSlotsOfSession($id){
        $allSlots = Session::find($id)->slots;
        $bookedSlots = Booking::where('session_id',$id)->count();
        $availableSlots = $allSlots - $bookedSlots;
        if ($availableSlots == 0){
            return response()->json("No available slots in this session");
        }
        return response()->json($availableSlots);
    }

    public function getAllAvailableSessions(){
       $allAvailableSessions = [];
       $sessions = Session::all();
       foreach ($sessions as $session){
           $allSlots = $session->slots;
           $bookedSlots = Booking::where('session_id',$session->id)->count();
           $availableSlots = $allSlots - $bookedSlots;
           if ($availableSlots > 0){
               $allAvailableSessions[] = $session;
           }

        }

        return response()->json($allAvailableSessions);
    }


    public function getSession($id){
        $session = Session::findOrFail($id);
        return response()->json($session);
    }

    public function addSession(Request $request){
        $session = new Session();
        $session->sport_id=$request->input('sport_id');
        $session->date=$request->input('date');
        $session->start_at=$request->input('start_at');
        $session->end_at=$request->input('end_at');
        $session->slots=$request->input('slots');

        $session->save();
        return response()->json($session);
    }

    public function updateSession(Request $request,$id){

        $session = Session::findOrFail($id);
        $session->sport_id=$request->input('sport_id');
        $session->date=$request->input('date');
        $session->start_at=$request->input('start_at');
        $session->end_at=$request->input('end_at');
        $session->slots=$request->input('slots');

        $session->save();
        return response()->json($session);
    }

    public function deleteSession($id){

        $session = Sport::findOrFail($id);
        $sessionId = $session->id;
        $session->delete();

        return response()->json("Session #".$sessionId." Deleted Successfully");
    }

}
