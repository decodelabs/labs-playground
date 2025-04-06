<?php

/**
 * @package Songsprout API
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http\Fragments;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Harvest\Request;
use DecodeLabs\Horizon\Page;

class Tab implements Action
{
    use ByMethodTrait;

    public function get(
        string $tab = '1'
    ): Page {
        return Page::fromFragment(
            fragment: '@components/fragments/tab',
            tab: $tab,
        );
    }

    public function post(
        Request $request,
        string $tab = '1'
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
