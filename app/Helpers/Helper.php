<?php

namespace App\Helper;

class Helper
{
 
    public  function check_role($role){

   
        // check the role of the authenticated user
        if ($user->role == 'admin') {
            return $role='admin';
        } 
       }
}
