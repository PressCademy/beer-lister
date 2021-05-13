<?php
namespace Beer_List\Dependencies\Composer\Installers;

class KohanaInstaller extends BaseInstaller
{
    protected $locations = array(
        'module' => 'modules/{$name}/',
    );
}
