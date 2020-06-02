<?php

namespace App\Http\Controllers;
use App\Academy;
use App\Pitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use Illuminate\Support\Facades\Validator;

class AcademiesController extends Controller
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
            $academies= Academy::orderBy('created_at','desc')->paginate(5);
            return view('academies.index')->with('academies',$academies);
        
    }
     public function search(Request $request){
         $search=$request->get('search');
         $academies= DB::table('academies')->where('name','like','%'.$search.'%')->paginate(5);
         return view('academies.index')->with('academies',$academies);

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pitches=Pitch::all();

        return view('academies.create')->with('pitches',$pitches);      
        
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
            'name' => ['required', 'string', 'max:255', 'unique:academies'],
   
    ]);
    


       
         
         $academy= new Academy;
         $academy->name =$request->input('name');
         $academy->pitch_id =$request->input('pitch_id');

            $academy->save();
           
         $request->session()->flash('success', 'academie creé avec succès');
       
         
         return redirect('academies');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $academy_id
     * @return \Illuminate\Http\Response
     */
    public function show($academy_id)
    {
       
        $academy= Academy::find($academy_id);
        return view('academies.show')->with('academy',$academy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $academy_id
     * @return \Illuminate\Http\Response
     */
    public function edit($academy_id)
    {    
        $pitches=Pitch::all();
        $academy= Academy::find($academy_id);
        return view('academies.edit',compact ('pitches','academy'));
             

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $academy_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $academy_id)
    {        
        $this -> validate($request ,[
            'name' => ['required', 'string', 'max:255'],
           

    ]);
    
  

        $academy= Academy::find($academy_id);
        $academy->name =$request->input('name');
        $academy->pitch_id =$request->input('pitch_id');
        $academy->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('academies');

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $academy_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $academy_id)
    {  
        $academy= Academy::find($academy_id);
        $academy->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('academies');
        }
}