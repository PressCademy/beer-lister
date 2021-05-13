<?php
namespace Beer_List\Dependencies\Composer\Installers;

class ReIndexInstaller extends BaseInstaller
{
    protected $locations = array(
        'theme'     => 'themes/{$name}/',
        'plugin'    => 'plugins/{$name}/'
    );
}
