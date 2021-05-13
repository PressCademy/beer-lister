<?php

namespace Beer_List\Dependencies\Faker\Provider\de_CH;

class Company extends \Beer_List\Dependencies\Faker\Provider\Company
{
    protected static $formats = [
        '{{lastName}} {{companySuffix}}',
        '{{lastName}} {{lastName}} {{companySuffix}}',
        '{{lastName}}',
        '{{lastName}}',
    ];

    protected static $companySuffix = ['AG', 'GmbH'];
}
