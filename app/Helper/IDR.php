<?php

namespace App\Helper;

class IDR
{
    public static function Format($param) {
        return number_format($param, 0, ',', '.');
    }
}
