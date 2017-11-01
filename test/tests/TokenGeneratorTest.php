<?php

use PHPUnit\Framework\Assert as PHPUnit;
use PHPUnit\Framework\TestCase;
use Tokenly\TokenGenerator\TokenGenerator;

/*
* 
*/
class TokenGeneratorTest extends TestCase
{

    public function testGenerateToken() {
        $generator = new TokenGenerator();
        $t1 = $generator->generateToken(10);
        PHPUnit::assertEquals(10, strlen($t1));

        $t2 = (new TokenGenerator())->generateToken(60, 'foo');
        PHPUnit::assertEquals(60, strlen($t2));
        PHPUnit::assertEquals('foo', substr($t2, 0, 3));
    } 

}
