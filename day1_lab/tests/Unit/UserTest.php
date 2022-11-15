<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\User_Test;

class Usertest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testname()
    {   
        $user = new  User_Test ;
        $this->assertEquals( 'mazen',$user->username());
        $this->assertEquals( 'mazen@gmail.com',$user->useremail());
        
    }
}
