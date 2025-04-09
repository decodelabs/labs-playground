<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground;

use DecodeLabs\Fabric\App\Generic;
use DecodeLabs\Genesis;
use DecodeLabs\Monarch;

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
        Monarch::$paths->alias('@public', '@run/public');
        Monarch::$paths->alias('@components', '@run/src/@components');
    }
}
