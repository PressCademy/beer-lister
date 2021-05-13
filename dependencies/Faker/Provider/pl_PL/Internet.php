<?php

namespace Beer_List\Dependencies\Faker\Provider\pl_PL;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'wp.pl', 'onet.pl', 'interia.pl', 'gazeta.pl'];
    protected static $tld = ['pl', 'pl', 'pl', 'pl', 'pl', 'pl', 'com', 'info', 'net', 'org', 'com.pl', 'com.pl'];
}
