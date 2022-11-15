<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Trial_tests;

class Facotrialtest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFactorial() {
        $n= new Trial_tests;
       
        $this->assertEquals(120, $n->factorial(5));
    }
}
