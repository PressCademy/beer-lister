<?php
namespace Beer_List\Dependencies\Composer\Installers;

class ElggInstaller extends BaseInstaller
{
    protected $locations = array(
        'plugin' => 'mod/{$name}/',
    );
}
