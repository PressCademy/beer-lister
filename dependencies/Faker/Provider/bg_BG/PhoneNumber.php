<?php

namespace Beer_List\Dependencies\Faker\Provider\bg_BG;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+359(0)#########',
        '+359(0)### ######',
        '+359(0)### ### ###',
        '+359#########',
        '0#########',
        '0### ######',
        '0### ### ###',
        '0### ###-###',
        '(0###) ######',
        '(0###) ### ###',
        '(0###) ###-###',
    ];
}
