<?php

namespace Beer_List\Dependencies\Faker\Provider\it_CH;

class Company extends \Beer_List\Dependencies\Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{lastName}} {{companySuffix}}',
        '{{lastName}}',
        '{{lastName}}',
    ];

    protected static $companySuffix = ['SA', 'Sarl'];
}
