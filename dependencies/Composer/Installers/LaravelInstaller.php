<?php
namespace Beer_List\Dependencies\Composer\Installers;

class LaravelInstaller extends BaseInstaller
{
    protected $locations = array(
        'library' => 'libraries/{$name}/',
    );
}
