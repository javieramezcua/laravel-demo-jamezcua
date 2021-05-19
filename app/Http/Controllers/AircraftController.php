<?php

namespace App\Http\Controllers;
use App\Models\AirCraft;
use Illuminate\Http\Request;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AirCraft::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $aircraft = AirCraft::create($request->all());

        return response()->json($aircraft, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(AirCraft $aircraft){
        $aircraft->delete();

        return response()->json(null, 204);
    }

    public function customSort(){
        $aircraft = new AirCraft();
        return $aircraft->sort_items();
    }
}
