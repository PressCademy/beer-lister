<?php
namespace Beer_List\Dependencies\Composer\Installers;

class SMFInstaller extends BaseInstaller
{
    protected $locations = array(
        'module' => 'Sources/{$name}/',
        'theme' => 'Themes/{$name}/',
    );
}
