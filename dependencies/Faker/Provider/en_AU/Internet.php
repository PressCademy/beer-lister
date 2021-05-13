<?php

namespace Beer_List\Dependencies\Faker\Provider\en_AU;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'gmail.com.au', 'yahoo.com.au', 'hotmail.com.au'];
    protected static $tld = ['com', 'com.au', 'org', 'org.au', 'net', 'net.au', 'biz', 'info', 'edu', 'edu.au'];
}
