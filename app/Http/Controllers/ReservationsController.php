<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Reservation;
use App\Client;
use App\Pitch;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reservation::all();
        $reservations = [];
        foreach ($data as $row) {
            $reservations[] = Calendar::event(
                $row->type,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        $calendar = Calendar::addEvents($reservations);
        return view('Reservations.index', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $pitchs = Pitch::all();
        return view('Reservations.create')->with('clients', $clients)->with('pitchs', $pitchs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $events = new Reservation();
        $events->type = $request->get('type');
        $events->start_date = $request->get('start_date');
        $events->end_date = $request->get('end_date');
        $events->client_id = $request->input('client_id');
        $events->pitch_id = $request->input('pitch_id');
        if ($request->get('type')=='match') {
            $events->color = '#0D2BD2';
        } else {
            $events->color = '#069322';

        }
        
        $events->save();
        return redirect('Reservations')->with('success', 'réservation créer avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $clients = Client::all();
        $pitchs = Pitch::all();
        $events = Reservation::orderBy('created_at','desc')->paginate(5);
        return view('Reservations.show')->with('events', $events)->with('clients', $clients)->with('pitchs', $pitchs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($reservation_id)
    {
        $clients = Client::all();
        $pitchs = Pitch::all();
        $event = Reservation::find($reservation_id);
        return view('Reservations.edit', compact('clients', 'event', 'pitchs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reservation_id)
    {

        $event = Reservation::find($reservation_id);
        $event->type = $request->get('type');
        $event->start_date = $request->get('start_date');
        $event->end_date = $request->get('end_date');
        $event->client_id = $request->input('client_id');
        $event->pitch_id = $request->input('pitch_id');
        if ($request->get('type')=='match') {
            $event->color = '#0D2BD2';
        } else {
            $event->color = '#069322';
        }

        $event->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('Reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $reservation_id)
    {
        $events = Reservation::find($reservation_id);

        //to delete reservation

        $events->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('Reservations');
    }
}