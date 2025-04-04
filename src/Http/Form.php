<?php

/**
 * @package Songsprout API
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Harvest\Request;
use DecodeLabs\Horizon\Page;

class Form implements Action
{
    use ByMethodTrait;

    public function get(): Page {
        return Page::fromFragment(
            fragment: '@components/pages/form',
        );
    }

    public function post(
        Request $request
    ) {
        $data = $request->getFormData();
        $name = $data->name->as('string');

        return Page::fromFragment(
            fragment: '@components/pages/form',
            name: $name,
        );
    }
}
