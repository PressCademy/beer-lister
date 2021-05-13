<?php

namespace Beer_List\Dependencies\Faker\Provider\sk_SK;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+421 ### ### ###',
        '00421 ### ### ###',
        '#### ### ###',
        '00421#########',
        '+421#########',
        '########',
    ];
}
