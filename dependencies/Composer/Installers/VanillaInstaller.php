<?php
namespace Beer_List\Dependencies\Composer\Installers;

class VanillaInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin'    => 'plugins/{$name}/',
        'theme'     => 'themes/{$name}/',
    );
}
