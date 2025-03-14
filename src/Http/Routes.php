<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf;
use DecodeLabs\Greenleaf\Generator;
use DecodeLabs\Greenleaf\GeneratorTrait;

class Routes implements Generator
{
    use GeneratorTrait;

    public function generateRoutes(): iterable
    {
        // Home
        yield Greenleaf::route('/', 'index')
            ->forMethod('get');

        yield Greenleaf::route('island-content')
            ->forMethod('get');
    }
}
