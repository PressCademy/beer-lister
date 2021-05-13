<?php

namespace Beer_List\Dependencies\Faker\Provider\cs_CZ;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $freeEmailDomain = ['gmail.com', 'yahoo.com', 'seznam.cz', 'atlas.cz', 'centrum.cz', 'email.cz', 'post.cz'];
    protected static $tld = ['cz', 'cz', 'cz', 'cz', 'cz', 'cz', 'com', 'info', 'net', 'org'];
}
