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

        yield Greenleaf::route('page2')
            ->forMethod('get');

        yield Greenleaf::route('form')
            ->forMethod('get', 'post');

        yield Greenleaf::route('tabs')
            ->forMethod('get');


        // Fragments
        yield Greenleaf::route('fragments/island-content')
            ->forMethod('get');

        yield Greenleaf::route('fragments/tab/{tab}', 'fragments/tab')
            ->forMethod('get', 'post')
            ->with('tab');
    }
}
