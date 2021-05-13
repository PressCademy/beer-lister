<?php
namespace Beer_List\Dependencies\Composer\Installers;

class AttogramInstaller extends BaseInstaller
{
    protected $locations = array(
        'module' => 'modules/{$name}/',
    );
}
