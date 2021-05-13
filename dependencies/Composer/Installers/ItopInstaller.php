<?php
namespace Beer_List\Dependencies\Composer\Installers;

class ItopInstaller extends BaseInstaller
{
    protected $locations = array(
        'extension'    => 'extensions/{$name}/',
    );
}
