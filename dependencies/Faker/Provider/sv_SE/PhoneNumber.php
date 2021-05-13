<?php

namespace Beer_List\Dependencies\Faker\Provider\sv_SE;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    /**
     * @var array Swedish phone number formats
     */
    protected static $formats = [
        '08-### ### ##',
        '0%#-### ## ##',
        '0%########',
        '+46 (0)%## ### ###',
        '+46(0)%########',
        '+46 %## ### ###',
        '+46%########',

        '08-### ## ##',
        '0%#-## ## ##',
        '0%##-### ##',
        '0%#######',
        '+46 (0)8 ### ## ##',
        '+46 (0)%# ## ## ##',
        '+46 (0)%## ### ##',
        '+46 (0)%#######',
        '+46(0)%#######',
        '+46%#######',

        '08-## ## ##',
        '0%#-### ###',
        '0%#######',
        '+46 (0)%######',
        '+46(0)%######',
        '+46%######',
    ];
}
