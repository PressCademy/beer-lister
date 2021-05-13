<?php

namespace Beer_List\Dependencies\Faker\Provider\ka_GE;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+995 ### ## ## ##',
        '### ## ## ##',
        '#########',
        '(###) ## ## ##',
        '+995(##)#######',
    ];
}
