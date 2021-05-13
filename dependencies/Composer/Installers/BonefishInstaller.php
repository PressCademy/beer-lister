<?php
namespace Beer_List\Dependencies\Composer\Installers;

class BonefishInstaller extends BaseInstaller
{
    protected $locations = array(
        'package'    => 'Packages/{$vendor}/{$name}/'
    );
}
