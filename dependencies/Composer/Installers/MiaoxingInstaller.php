<?php

namespace Beer_List\Dependencies\Composer\Installers;

class MiaoxingInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin' => 'plugins/{$name}/',
    );
}
