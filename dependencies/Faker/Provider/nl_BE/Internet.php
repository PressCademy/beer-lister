<?php

namespace Beer_List\Dependencies\Faker\Provider\nl_BE;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'hotmail.com', 'yahoo.com', 'advalvas.be'];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'be', 'be', 'be'];
}
