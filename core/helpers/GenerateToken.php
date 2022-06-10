<?php

namespace core\helpers;

use core\Config;
use Exception;

/**
 * Class GenerateToken
 *
 * @author Celio Natti <Celionatti@gmail.com>
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class GenerateToken
{
    public static function createToken()
    {
        //Generate a random string.
        $token = openssl_random_pseudo_bytes(16);
        return bin2hex($token);
    }

    /**
     * @throws Exception
     */
    public static function rand_str()
    {
        $characters = '0123456789-=+{}[]:;@#~.?/&gt;,&lt;|\!"£$%^&amp;*()abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomStr = '';
        for ($i = 0; $i < random_int(50, 100); $i++) {
            $randomStr .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomStr;
    }

    public static function randomString($length): string
    {
        $array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

        $text = "";

        for ($i = 0; $i < $length; $i++) {
            $random = rand(0, 61);
            $text .= $array[$random];
        }
        return $text;
    }

    public static function randomPassword(): string
    {
        $alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public static function TransactID($length, $prefix = ''): string
    {
        $array = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, '|');

        $text = "";

        for ($i = 0; $i < $length; $i++) {
            $random = rand(0, 10);
            $text .= $array[$random];
        }
        return $prefix . ':'.  strtolower($text) . time();
    }
}