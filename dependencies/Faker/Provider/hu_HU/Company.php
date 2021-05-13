<?php

namespace Beer_List\Dependencies\Faker\Provider\hu_HU;

class Company extends \Beer_List\Dependencies\Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companySuffix}}',
        '{{lastName}}',
    ];

    protected static $companySuffix = ['Kft', 'és Tsa', 'Kht', 'ZRT', 'NyRT', 'BT'];
}
