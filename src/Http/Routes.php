<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf;
use DecodeLabs\Greenleaf\Generator;

class Routes implements Generator
{
    public function generateRoutes(): iterable
    {
        Greenleaf::setDefaultPageType('php');

        // Fragments
        yield Greenleaf::action('fragments/tab/{tab}', 'fragments/tab')
            ->forMethod('get', 'post')
            ->with('tab');
    }
}
