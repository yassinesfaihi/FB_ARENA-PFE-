<?php

namespace App\Http\Controllers;

use App\Pitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use Illuminate\Support\Facades\Validator;

class PitchesController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
        
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
            $pitches= Pitch::orderBy('created_at','desc')->paginate(5);
            return view('pitches.index')->with('pitches',$pitches);
        
    }
     public function search(Request $request){
         $search=$request->get('search');
         $pitches= DB::table('pitches')->where('name','like','%'.$search.'%')->paginate(5);
         return view('pitches.index')->with('pitches',$pitches);

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pitches.create');      
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this -> validate($request ,[
            'name' => ['required', 'string', 'max:20', 'unique:pitches'],
            'capacity' => ['required', 'numeric', 'digits:2'],
            'price' => ['required', 'numeric', 'digits:2'],
            'state' => ['required', 'string', 'max:20',],

    ]);
    


       
         
        $user_id=Auth::user()->id;
        
         $pitch = new pitch;
         $pitch ->name =$request->input('name');
         $pitch ->capacity =$request->input('capacity');
         $pitch ->price =$request->input('price');
         $pitch ->state =$request->input('state');
         $pitch ->user_id =$user_id;

            $pitch->save();
           
         $request->session()->flash('success', 'terrain creé avec succès');
       
         
         return redirect('pitches');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $pitche_id
     * @return \Illuminate\Http\Response
     */
    public function show($pitch_id)
    {
       
        $pitch= pitch::find($pitch_id);
        return view('pitches.show')->with('pitch',$pitch);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pitche_id
     * @return \Illuminate\Http\Response
     */
    public function edit($pitch_id)
    {
        $pitch= pitch::find($pitch_id);
        return view('pitches.edit')->with('pitch',$pitch);
             

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pitche_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pitch_id)
    {        
        $this -> validate($request ,[
            'name' => ['required', 'string', 'max:20'],
            'capacity' => ['required', 'numeric', 'digits:2'],
            'price' => ['required', 'numeric', 'digits:2'],
            'state' => ['required', 'string', 'max:20',],

    ]);
    
  

        $pitch= pitch::find($pitch_id);
        $pitch ->name =$request->input('name');
        $pitch ->capacity =$request->input('capacity');
        $pitch ->price =$request->input('price');
        $pitch ->state =$request->input('state');
        $pitch->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('pitches');

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pitche_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $pitch_id)
    {  
        $pitch= pitch::find($pitch_id);
        $pitch->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('pitches');
        }
}