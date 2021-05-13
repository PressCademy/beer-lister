<?php
namespace Beer_List\Dependencies\Composer\Installers;

class FuelInstaller extends BaseInstaller
{
    protected $locations = array(
        'module'  => 'fuel/app/modules/{$name}/',
        'package' => 'fuel/packages/{$name}/',
        'theme'   => 'fuel/app/themes/{$name}/',
    );
}
