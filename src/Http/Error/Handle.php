<?php

/**
 * @package Labs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http\Error;

use DecodeLabs\Glitch;
use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Greenleaf\Route\Action as Route;
use DecodeLabs\Harvest\Response\Text as TextResponse;
use DecodeLabs\Monarch;
use Throwable;

#[Route('error/{code}', method: 'get')]
class Handle implements Action
{
    use ByMethodTrait;

    public function get(
        string $code,
        Throwable $exception,
        Glitch $glitch
    ): TextResponse {
        if (Monarch::isDevelopment()) {
            $glitch->handleException($exception);
        }

        return new TextResponse('Error: ' . $code);
    }
}
