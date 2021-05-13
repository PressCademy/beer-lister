<?php
namespace Beer_List\Dependencies\Composer\Installers;

class PortoInstaller extends BaseInstaller
{
    protected $locations = array(
        'container' => 'app/Containers/{$name}/',
    );
}
