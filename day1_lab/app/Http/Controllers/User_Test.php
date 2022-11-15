<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_Test extends Controller
{
    public function user($name, $email)
    {
        $this->name= $name;
        $this->email = $email;
    }
       

         function username( $name="mazen"){
            $this->name=$name;
            return $name;
        }
         function useremail( $email="mazen@gmail.com"){
            $this->email=$email;
            return $email;
        }
    
}
