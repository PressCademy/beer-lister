<?php

namespace Beer_List\Dependencies\Faker\Provider\it_IT;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'hotmail.com', 'email.it', 'libero.it', 'yahoo.it'];
    protected static $tld = ['com', 'com', 'com', 'net', 'org', 'it', 'it', 'it'];
}
