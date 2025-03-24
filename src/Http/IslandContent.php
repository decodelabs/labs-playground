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
        return Harvest::html(function() {
            yield Html::p('This is fragment content!');

            yield Html::{'component-island[src=AnotherReactThing]'}(function ($el) {
                yield Html::div('Fallback content');

                $el->setAttribute('props', json_encode([
                    'says' => 'this is nested!'
                ]));
            });
        });
    }
}
