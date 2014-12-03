<?php

namespace Tokenly\TokenGenerator;

use Exception;

/*
* TokenGenerator
*/
class TokenGenerator
{

    ////////////////////////////////////////////////////////////////////////



    public function generateToken($length=30, $prefix='', $chars=null) {
        $length = $length - strlen($prefix);
        if ($length < 0) { throw new Exception("Prefix is too long", 1); }
        $token = "";

        if ($chars === null) {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            $number_of_chars = 62;
        } else {
            $number_of_chars = strlen($chars);
        }

        for($i=0; $i < $length; $i++){
            $token .= $chars[self::random(0, $number_of_chars)];
        }

        return $prefix.$token;
    }


    ////////////////////////////////////////////////////////////////////////

    protected function random($min, $max) {
        $range = $max - $min;

        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);

        return $min + $rnd;
    }


}

