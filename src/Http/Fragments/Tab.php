<?php

/**
 * Songsprout API
 * @license https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http\Fragments;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Greenleaf\Route\Action as Route;
use DecodeLabs\Greenleaf\Route\Parameter;
use DecodeLabs\Harvest\Request;
use DecodeLabs\Horizon\Page;

#[Route('fragments/tab/{tab}', method: ['get', 'post'])]
#[Parameter('tab', default: '1')]
class Tab implements Action
{
    use ByMethodTrait;

    public function get(
        string $tab
    ): Page {
        return Page::fromFragment(
            fragment: '@components/fragments/tab',
            tab: $tab,
        );
    }

    public function post(
        Request $request,
        string $tab
    ): Page {
        $data = $request->getFormData();
        $name = $data->name->as('string');

        return Page::fromFragment(
            fragment: '@components/fragments/tab',
            tab: $tab,
            name: $name,
        );
    }
}
