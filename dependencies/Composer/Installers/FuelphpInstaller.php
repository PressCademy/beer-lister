<?php
namespace Beer_List\Dependencies\Composer\Installers;

class FuelphpInstaller extends BaseInstaller
{
    protected $locations = array(
        'component'  => 'components/{$name}/',
    );
}
