<?php

namespace App\Http\Controllers;

use App\member;
use App\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class membersController extends Controller
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
        $members = Member::orderBy('created_at', 'desc')->paginate(5);
        return view('members.index')->with('members', $members);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $members = Member::orderBy('created_at', 'desc')->where('name', 'like', '%' . $search . '%')->paginate(5);
        return view('members.index')->with('members', $members);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academies = Academy::all();

        return view('members.create')->with('academies', $academies);
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
            'age' => ['required', 'numeric', 'digits_between:1,2'],
            'phone' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'state' => ['required', 'string', 'max:255'],
            'avatar' => ['image', 'max:3999'],

        ]);

         // Handle File Upload
         if($request->hasFile('avatar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('avatar')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('avatar')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('avatar')->storeAs('public/avatars', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }







        $member = new Member;
        $member->name = $request->input('name');
        $member->age = $request->input('age');
        $member->phone = $request->input('phone');
        $member->state = $request->input('state');
        $member->academy_id = $request->input('academy_id');
        $member->avatar = $fileNameToStore;

        $member->save();
        $request->session()->flash('success', 'membre creé avec succès');


        return redirect('members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {

        $member = member::find($member_id);
        return view('members.show')->with('member', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function edit($member_id)
    {
        $academies = Academy::all();
        $member = member::find($member_id);
        return view('members.edit', compact('academies', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $member_id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric', 'digits_between:1,2'],
            'phone' => ['required', 'numeric', 'digits:8', 'unique:users'],
            'state' => ['required', 'string', 'max:255'],
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


        $member = member::find($member_id);
        $member->name = $request->input('name');
        $member->age = $request->input('age');
        $member->phone = $request->input('phone');
        $member->state = $request->input('state');
        $member->academy_id = $request->input('academy_id');
        if ($request->hasFile('avatar')) {
            $member->avatar = $fileNameToStore;
        }

        $member->save();
        $request->session()->flash('success', 'Modification faite avec succès');

        return redirect('members');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $member_id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $member_id)
    {

        $member = member::find($member_id);

        //to delete the avatar after deleting the member
        if ($member->avatar != 'noimage.jpg') {
            Storage::delete('public/avatars/' . $member->avatar);
        }

        $member->delete();
        $request->session()->flash('success', 'suppression faite avec succès');

        return redirect('members');
    }
}