<?php

/**
 * DecodeLabs Playground
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground;

use DecodeLabs\Fabric\Kingdom as FabricKingdom;
use DecodeLabs\Monarch;

class Kingdom extends FabricKingdom
{
    public protected(set) string $name = 'DecodeLabs Playground';

    public function initialize(): void
    {
        parent::initialize();

        Monarch::getPaths()->alias('@public', '@run/public');
        Monarch::getPaths()->alias('@components', '@run/src/@components');
    }
}
