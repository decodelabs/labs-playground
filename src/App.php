<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground;

use DecodeLabs\Fabric\App\Generic;
use DecodeLabs\Genesis;

class App extends Generic
{
    /*
    public function prepareHttpMiddleware(): ?array
    {
        return [
            // Error
            'ErrorHandler',

            // Inbound
            'Https',
            'Cors',

            // Outbound
            'ContentSecurityPolicy',

            // Generators
            'Zest',
            'Greenleaf'
        ];
    }
        */

    public function initializePlatform(): void
    {
        Genesis::aliasPath('@public', Genesis::$build->path . '/public');
        Genesis::aliasPath('@components', Genesis::$build->path . '/src/@components');
    }
}
