<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Trial_tests extends Controller
{
    public function factorial($n) {
        if (is_int($n) && $n >= 0) {
            $factorial = 1;
            for ($i = 2; $i <= $n; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        } 
        
    }
    
    public function USER(){

    }

//   public  function Factorial($number){
//         $factorial = 1;
//         for ($i = 1; $i <= $number; $i++){
//         $factorial = $factorial * $i;
//         }
//         return $factorial;
//     }
   

}
