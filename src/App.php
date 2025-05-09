<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground;

use DecodeLabs\Fabric\App\Generic;
use DecodeLabs\Monarch;

class App extends Generic
{
    public function initializePlatform(): void
    {
        Monarch::$paths->alias('@public', '@run/public');
        Monarch::$paths->alias('@components', '@run/src/@components');
    }
}
