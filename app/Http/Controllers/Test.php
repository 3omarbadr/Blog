<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Test extends Controller
{
    function removeDuplicates() {
        $nums = [1,1,1,2];
        $count = 0 ;
        if (count($nums) == 0) return 0;
        for($i = 0; $i < count($nums); $i++) {
              if($i < count($nums) -1 && $nums[$i] == $nums[$i +1]) continue;
               $nums[$count] = $nums[$i];
                $count++;
       }
       return $count;
        
    }

}
