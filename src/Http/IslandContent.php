<?php

/**
 * @package Songsprout API
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Horizon\Page;

class IslandContent implements Action
{
    use ByMethodTrait;

    public function get(): Page {
        return Page::fromFragment(
            fragment: '@components/fragments/island-content',
        );
    }
}
