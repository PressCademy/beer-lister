<?php
namespace Beer_List\Dependencies\Composer\Installers;

class AimeosInstaller extends BaseInstaller
{
    protected $locations = array(
        'extension'   => 'ext/{$name}/',
    );
}
