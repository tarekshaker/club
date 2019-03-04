<?php

namespace App\Http\Controllers\API;

use App\Booking;
use App\Session;
use App\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function __construct( Booking $booking )
    {
        $this->booking = $booking;
    }

    public function getAllBookings(){
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function getBooking($id){
        $booking = Booking::findOrFail($id);
        return response()->json($booking);
    }

    public function addBooking(Request $request){

        $session_id = $request->input('session_id');
        $allSlots = Session::find($session_id)->slots;
        $bookedSlots = Booking::where('session_id',$session_id)->count();
        $availableSlots = $allSlots - $bookedSlots;
        if ($availableSlots == 0){
           $booking = "No available slots in this session";
        }else{
            $booking = new Booking();
            $booking->session_id=$request->input('session_id');
            $booking->user_id=$request->input('user_id');
            $booking->save();

        }
        return response()->json($booking);
    }

    public function updateBooking(Request $request,$id){

        $booking = Booking::findOrFail($id);
        $booking->session_id=$request->input('session_id');
        $booking->user_id=$request->input('user_id');

        $booking->save();
        return response()->json($booking);
    }

    public function deleteBooking($id){

        $booking = Booking::findOrFail($id);
        $bookingId = $booking->name;
        $booking->delete();

        return response()->json("Booking #".$bookingId." Deleted Successfully");
    }

    public function getSportWithMaxAttendees(){

        $sportName = Sport::withCount('bookings')
            ->orderBy('bookings_count','DESC')
            ->get()
            ->first()
            ->name;
        return response()->json($sportName);

    }

    public function getSessionsWithBookingTime(){

        $sessions = Session::join('bookings', 'sessions.id', '=', 'bookings.session_id')
            ->orderBy('bookings.created_at', 'desc')
            ->select('sessions.*')
            ->get();

        return response()->json($sessions);

    }

}
