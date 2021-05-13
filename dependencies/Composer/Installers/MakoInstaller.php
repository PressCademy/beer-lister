<?php
namespace Beer_List\Dependencies\Composer\Installers;

class MakoInstaller extends BaseInstaller
{
    protected $locations = array(
        'package' => 'app/packages/{$name}/',
    );
}
