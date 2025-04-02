<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Horizon\Page;

class Index implements Action
{
    use ByMethodTrait;

    public function get(): Page
    {
        return Page::fromFragment(
            fragment: '@components/pages/index'
        );
    }
}
