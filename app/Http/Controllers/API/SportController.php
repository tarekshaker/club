<?php

namespace App\Http\Controllers\API;

use App\Sport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SportController extends Controller
{
    public function getAllSports(){
        $sports = Sport::all();
        return response()->json($sports);
    }

    public function getSport($id){
        $sport = Sport::findOrFail($id);
        return response()->json($sport);
    }

    public function addSport(Request $request){
        $sport = new Sport();
        $sport->name=$request->input('name');

        $sport->save();
        return response()->json($sport);
    }

    public function updateSport(Request $request,$id){

        $sport = Sport::findOrFail($id);
        $sport->name = $request->input('name');

        $sport->save();
        return response()->json($sport);
    }

    public function deleteSport($id){

        $sport = Sport::findOrFail($id);
        $sportName = $sport->name;
        $sport->delete();

        return response()->json($sportName." Deleted Successfully");
    }

}
