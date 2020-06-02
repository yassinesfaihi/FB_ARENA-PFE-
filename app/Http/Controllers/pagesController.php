<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function profil() {
        return view('users.profil');
    }

    public function profilUser() {
        return view('users.profilUser');
    }

}
