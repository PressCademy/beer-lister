<?php

namespace Beer_List\Dependencies\Faker\Provider\hu_HU;

class PhoneNumber extends \Beer_List\Dependencies\Faker\Provider\PhoneNumber
{
    protected static $formats = [
        '+36-##-###-####',
        '+36#########',
        '+36(##)###-###',
        '06-##-###-####',
        '06(##)###-###',
    ];
}
