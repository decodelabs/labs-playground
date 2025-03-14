<?php

/**
 * @package Songsprout API
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Greenleaf\Request;
use DecodeLabs\Harvest;
use DecodeLabs\Harvest\Response;
use DecodeLabs\Tagged as Html;
use Generator;

class IslandContent implements Action
{
    use ByMethodTrait;

    public function get(
        Request $request
    ): Response {
        return Harvest::html(Html::p('This is island content!'));
    }
}
