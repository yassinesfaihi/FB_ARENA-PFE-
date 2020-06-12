<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class statsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = Carbon::now();

        $pitches1 = DB::table('pitches')->where('state', 'disponible')->count();
        $pitches2 = DB::table('pitches')->where('state', 'en travaux')->count();
        $reservations1 = DB::table('Reservations')->where('type', 'match')->count();
        $reservations2 = DB::table('Reservations')->where('type', 'tournoi')->count();
        $reservations3 = DB::table('Reservations')->count();
        $reservations4 = DB::table('Reservations')->whereDate('start_date', today())->count();
        $reservations5 = DB::table('Reservations')->whereMonth('start_date', $dt->month)->count();
        $reservations6 = DB::table('Reservations')->whereBetween('start_date', [$dt->subDays(7), today()])->count();
        $clients = DB::table('clients')->count();
        $clients2 = DB::table('clients')->where('adress', 'LIKE', '%ariana%')->count();
        $clients3 = DB::table('clients')->where('adress', 'LIKE', '%manouba%')->count();
        $clients4 = DB::table('clients')->where('adress', 'LIKE', '%tunis%')->count();
        $clients5 = DB::table('clients')->where('adress', 'LIKE', '%ben arous%')->ORWHERE('adress', 'LIKE', '%benarous%')->count();
        $clients6 = DB::table('clients')->where('adress', 'NOT LIKE', '%tunis%')->ORWHERE('adress', 'NOT LIKE', '%benarous%')->ORWHERE('adress', 'NOT LIKE', '%ariana%')->ORWHERE('adress', 'NOT LIKE', '%manouba%')->count();
        $members = DB::table('members')->count();
        $members1 = DB::table('members')->where('age', '<', 18)->count();
        $members2 = DB::table('members')->where('age', '>=', 18)->count();
        $members3 = DB::table('members')->where('state', '=', 'paye')->count();
        $members4 = DB::table('members')->where('state', '=', 'retard')->count();

        return view('stats.index', compact('reservations1', 'reservations2', 'reservations3', 'reservations4', 'reservations5', 'reservations6', 'members', 'members1', 'members2', 'members3', 'members4', 'pitches1', 'pitches2', 'clients', 'clients2', 'clients3', 'clients4', 'clients5', 'clients6'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}