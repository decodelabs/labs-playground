<?php

/**
 * Labs Playground
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http\Fragments;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Greenleaf\Route\Action as Route;
use DecodeLabs\Horizon\Page;

#[Route('fragments/island-content', method: 'get')]
class IslandContent implements Action
{
    use ByMethodTrait;

    public function get(): Page
    {
        return Page::fromFragment(
            fragment: '@components/fragments/island-content',
        );
    }
}
