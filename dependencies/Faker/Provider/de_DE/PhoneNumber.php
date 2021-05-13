<?php

namespace Beer_List\Dependencies\Faker\Provider\de_DE;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+49(0)##########',
        '+49(0)#### ######',
        '+49 (0) #### ######',
        '+49(0) #########',
        '+49(0)#### #####',
        '0##########',
        '0#########',
        '0#### ######',
        '0#### #####',
        '(0####) ######',
        '(0####) #####',
    ];

    protected static $e164Formats = [
        '+49##########',
    ];
}
