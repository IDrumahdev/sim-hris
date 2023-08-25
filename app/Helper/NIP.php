<?php

namespace App\Helper;

use WahyuDwiKrisnanto\SequenceNumberGenerator\SequenceBuilder;

class NIP
{
    public static function generate()
    {
        $nip = new SequenceBuilder;
        return $nip->generate();
    }
}
