<?php

namespace Beer_List\Dependencies\Faker\Provider\he_IL;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '05#-#######',
        '0#-#######',
        '972-5#-#######',
        '972-#-########',
        '0#########',
    ];
}
