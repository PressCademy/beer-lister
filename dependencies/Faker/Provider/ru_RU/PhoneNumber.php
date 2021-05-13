<?php

namespace Beer_List\Dependencies\Faker\Provider\ru_RU;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '(812) ###-##-##',
        '(495) ###-####',
        '+7 (922) ###-####',
        '(35222) ##-####',
        '8-800-###-####',
    ];
}
