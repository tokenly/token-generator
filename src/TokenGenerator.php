<?php

namespace Tokenly\TokenGenerator;

use Exception;

/*
* TokenGenerator
*/
class TokenGenerator
{

    /**
     * generates a secure random string
     * @param  integer $token_length The number of characters including the prefix
     * @param  string  $prefix       A prefix for the random string
     * @return string                The random string starting with prefix
     */
    public function generateToken($token_length=30, $prefix='') {
        $token_length = $token_length - strlen($prefix);
        if ($token_length < 0) { throw new Exception("Prefix is too long", 1); }
        
        $token = "";
        while (($len = strlen($token)) < $token_length) {
            $remaining_len = $token_length - $len;
            $bytes = random_bytes($remaining_len);
            $token .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $remaining_len);
        }

        return $prefix.$token;
    }

}
