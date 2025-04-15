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

        // Home
        /*
        yield Greenleaf::page('/', 'index.php')
            ->forMethod('get');

        yield Greenleaf::page('propagate')
            ->forMethod('get');

        yield Greenleaf::page('form')
            ->forMethod('get', 'post');

        yield Greenleaf::page('slow')
            ->forMethod('get');

        yield Greenleaf::page('tabs')
            ->forMethod('get');
            */


        // Fragments
        yield Greenleaf::action('fragments/island-content')
            ->forMethod('get');

        yield Greenleaf::action('fragments/tab/{tab}', 'fragments/tab')
            ->forMethod('get', 'post')
            ->with('tab');
    }
}
