<?php

namespace Beer_List\Dependencies\Composer\Installers;

class DframeInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'  => 'modules/{$vendor}/{$name}/',
    );
}
