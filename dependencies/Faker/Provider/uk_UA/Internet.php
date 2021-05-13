<?php

namespace Beer_List\Dependencies\Faker\Provider\uk_UA;

class Internet extends \Beer_List\Dependencies\Faker\Provider\Internet
{
    protected static $tld = ['ua', 'com.ua', 'org.ua', 'net.ua', 'com', 'net', 'org'];
    protected static $freeEmailDomain = ['gmail.com', 'mail.ru', 'ukr.net', 'i.ua', 'rambler.ru'];
}
