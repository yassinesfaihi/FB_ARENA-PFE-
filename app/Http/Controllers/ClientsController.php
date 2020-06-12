<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB; 
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
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
            $clients= Client::orderBy('created_at','desc')->paginate(5);
            return view('clients.index')->with('clients',$clients);
        
    }
     public function search(Request $request){
         $search=$request->get('search');
         $clients= DB::table('clients')->where('name','like','%'.$search.'%')->paginate(5);
         return view('clients.index')->with('clients',$clients);

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('clients.create');      
        
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
            'name' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'numeric', 'digits:8', 'unique:clients'],
            'adress' => ['required', 'string', 'max:20'],

    ]);
    


       
         
         

         $client = new Client;
         $client ->name =$request->input('name');
         $client ->phone =$request->input('phone');
         $client ->adress =$request->input('adress');

            $client->save();
           
         $request->session()->flash('success', 'client creé avec succès');
       
         
         return redirect('clients');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function show($client_id)
    {
       
        $client= Client::find($client_id);
        return view('clients.show')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function edit($client_id)
    {
        $client= client::find($client_id);
        return view('clients.edit')->with('client',$client);
             

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client_id)
    {        
            $this -> validate($request ,[
            'name' => ['required', 'string', 'max:20'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'adress' => ['required', 'string', 'max:20'],

    ]);
  

        $client= Client::find($client_id);
        $client ->name =$request->input('name');
        $client ->phone =$request->input('phone');
        $client ->adress =$request->input('adress');
        $client->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $client_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $client_id)
    {  
        $client= Client::find($client_id);
        $client->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('clients');
        }
}