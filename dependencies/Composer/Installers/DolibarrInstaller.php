<?php
namespace Beer_List\Dependencies\Composer\Installers;

/**
 * Class DolibarrInstaller
 *
 * @package Beer_List\Dependencies\Composer\Installers
 * @author  Raphaël Doursenaud <rdoursenaud@gpcsolutions.fr>
 */
class DolibarrInstaller extends BaseInstaller
{
    //TODO: Add support for scripts and themes
    protected $locations = array(
        'module' => 'htdocs/custom/{$name}/',
    );
}
