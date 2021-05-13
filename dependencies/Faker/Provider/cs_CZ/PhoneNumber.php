<?php

namespace Beer_List\Dependencies\Faker\Provider\cs_CZ;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+420 %## ### ###',
        '%## ### ###',
        '00420%########',
        '+420%########',
        '%########',
    ];
}
