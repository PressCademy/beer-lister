<?php
namespace Beer_List\Dependencies\Composer\Installers;

class KnownInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin'    => 'IdnoPlugins/{$name}/',
        'theme'     => 'Themes/{$name}/',
        'console'   => 'ConsolePlugins/{$name}/',
    );
}
