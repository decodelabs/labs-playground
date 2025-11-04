<?php

/**
 * DecodeLabs Playground
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf\Generator;
use DecodeLabs\Greenleaf\Route\Action;
use DecodeLabs\Greenleaf\Route\Parameter;

class Routes implements Generator
{
    public function generateRoutes(): iterable
    {
        yield new Action(
            pattern: 'fragments/tab/{tab}',
            target: 'fragments/tab',
            method: ['get', 'post'],
            parameters: [
                new Parameter\Slug('tab')
            ]
        );
    }
}
