<?php

namespace Beer_List\Dependencies\Faker\Provider\de_CH;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = [
        'gmail.com',
        'hotmail.com',
        'yahoo.com',
        'googlemail.com',
        'gmx.ch',
        'bluewin.ch',
        'swissonline.ch',
    ];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'li', 'ch', 'ch'];
}
