<?php
namespace Beer_List\Dependencies\Composer\Installers;

class SyliusInstaller extends BaseInstaller
{
    protected $locations = array(
        'theme' => 'themes/{$name}/',
    );
}
