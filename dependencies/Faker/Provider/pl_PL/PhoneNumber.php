<?php

namespace Beer_List\Dependencies\Faker\Provider\pl_PL;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+48 ## ### ## ##',
        '0048 ## ### ## ##',
        '### ### ###',
        '+48 ### ### ###',
        '0048 ### ### ###',
        '#########',
        '(##) ### ## ##',
        '+48(##)#######',
        '0048(##)#######',
    ];
}
