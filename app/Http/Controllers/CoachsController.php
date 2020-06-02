<?php

namespace App\Http\Controllers;

use App\coach;
use App\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CoachsController extends Controller
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
        $coachs = Coach::orderBy('created_at', 'desc')->paginate(5);
        return view('coachs.index')->with('coachs', $coachs);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $coachs = coach::orderBy('created_at', 'desc')->where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('coachs.index')->with('coachs', $coachs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academies = Academy::all();

        return view('coachs.create')->with('academies', $academies);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric'],
            'hire_date' => ['required', 'Date'],
            'avatar' => ['image', 'max:3999'],

        ]);

        if ($request->hasFile('avatar')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }







        $coach = new Coach;
        $coach->name = $request->input('name');
        $coach->salary = $request->input('salary');
        $coach->hire_date = $request->input('hire_date');
        $coach->academy_id = $request->input('academy_id');
        $coach->avatar = $fileNameToStore;

        $coach->save();
        $request->session()->flash('success', 'entreneur creé avec succès');


        return redirect('coachs');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $coach_id
     * @return \Illuminate\Http\Response
     */
    public function show($coach_id)
    {

        $coach = coach::find($coach_id);
        return view('coachs.show')->with('coach', $coach);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $coach_id
     * @return \Illuminate\Http\Response
     */
    public function edit($coach_id)
    {
        $academies = Academy::all();
        $coach = coach::find($coach_id);
        return view('coachs.edit', compact('academies', 'coach'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $coach_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $coach_id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'salary' => ['required', 'numeric'],
            'hire_date' => ['required', 'Date'],
            'avatar' => ['image', 'max:3999'],

        ]);

        if ($request->hasFile('avatar')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        }


        $coach = coach::find($coach_id);
        $coach->name = $request->input('name');
        $coach->salary = $request->input('salary');
        $coach->hire_date = $request->input('hire_date');
        $coach->academy_id = $request->input('academy_id');
        if ($request->hasFile('avatar')) {
            $coach->avatar = $fileNameToStore;
        }

        $coach->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('coachs');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $coach_id)
    {

        $coach = coach::find($coach_id);

        //to delete the avatar after deleting the coach
        if ($coach->avatar != 'noimage.jpg') {
            Storage::delete('public/avatars/' . $coach->avatar);
        }

        $coach->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('coachs');
    }
}