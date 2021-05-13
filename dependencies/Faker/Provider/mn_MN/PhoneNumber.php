<?php

namespace Beer_List\Dependencies\Faker\Provider\mn_MN;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '9#######',
        '8#######',
        '7#######',
        '3#####',
    ];
}
