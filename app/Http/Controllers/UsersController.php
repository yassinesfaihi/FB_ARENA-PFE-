<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB; 


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\mail\welcomemail;

class UsersController extends Controller
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
        if (Auth::user()->role == 'admin') {
            $users= User::orderBy('created_at','desc')->paginate(5);
            return view('admin.users.index')->with('users',$users);
        } else {
           $users= User::all();
            return view('prop.users.index')->with('users',$users->where('role','gerant'));
        }
    }
     public function search(Request $request){
         $search=$request->get('search');
         $users= DB::table('users')->where('name','like','%'.$search.'%')->paginate(5);
         return view('admin.users.index')->with('users',$users);

     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin')
        return view('admin.users.create');      
        else
        return view('prop.users.create');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'adress' => ['required', 'string', 'max:20'],

    ]);
    // password verification is not required when the current user is the admin , because the system automatically generate th pw
    if (Auth::user()->role != 'admin'){
    $this -> validate($request ,[
    
        'password' => ['required', 'string', 'min:8', 'confirmed'],

]);}
       
         $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
         $password = substr($random, 0, 12);

         $user = new user;
         $user ->name =$request->input('name');
         $user ->email =$request->input('email');
         $user ->phone =$request->input('phone');
         $user ->adress =$request->input('adress');
   
        // check the role of the  authenticated
        
        
       
            
         if (Auth::user()->role == 'admin') {
            $user ->role =('prop');
            $user ->password=Hash::make($password);
            $user->save();
            //send welcome email to the new user
            Mail::to($request['email'])->send(new welcomemail($request ,$password));
            //show succes notification
         $request->session()->flash('success', 'compte utilisateur cree avec succes');
        } else 
         {
            $user ->role =('gerant');
            $user ->password=Hash::make($request->input('password'));
            $user->save();
            //show succes notification
         $request->session()->flash('success', 'compte gerant cree avec succes');
         }
         
         

return redirect('users');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $user= User::find($id);
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= user::find($id);
        if (Auth::user()->id==$id)
        return view('users.editProfil')->with('user',$user);
        else
        return view('users.editUser')->with('user',$user);      

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
            $this -> validate($request ,[
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'adress' => ['required', 'string', 'max:20'],

    ]);
    if (Auth::user()->id==$id){
    $this -> validate($request ,[
    
        'password' => ['required', 'string', 'min:8', 'confirmed'],

]);}

        $user= user::find($id);
        $user ->name =$request->name;
        $user ->email =$request->input('email');
        $user ->phone =$request->input('phone');
        $user ->adress =$request->input('adress');
        if (Auth::user()->id==$id) 
        {$user ->password =Hash::make($request->input('password'));}
        $user->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('users');

    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {  
        $user= User::find($id);
        $user->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('/users');
        }
}

