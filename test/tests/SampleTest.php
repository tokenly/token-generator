<?php

use Tokenly\TokenGenerator\TokenGenerator;
use \Exception;
use \PHPUnit_Framework_Assert as PHPUnit;

/*
* 
*/
class TokenGeneratorTest extends \PHPUnit_Framework_TestCase
{


    public function testGenerateToken() {
        $generator = new TokenGenerator();
        $t1 = $generator->generateToken(10);
        PHPUnit::assertEquals(10, strlen($t1));

        $t2 = $generator->generateToken(60, 'foo');
        PHPUnit::assertEquals(60, strlen($t2));
        PHPUnit::assertEquals('foo', substr($t2, 0, 3));

    } 



}
