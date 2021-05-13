<?php

namespace Beer_List\Dependencies\Composer\Installers;

class PuppetInstaller extends BaseInstaller
{

    protected $locations = array(
        'module' => 'modules/{$name}/',
    );
}
