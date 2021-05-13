<?php
namespace Beer_List\Dependencies\Composer\Installers;

class PPIInstaller extends BaseInstaller
{
    protected $locations = array(
        'module' => 'modules/{$name}/',
    );
}
