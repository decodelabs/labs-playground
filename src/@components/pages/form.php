<?php

use DecodeLabs\Greenleaf\Route\Page as Route;
use DecodeLabs\Harvest\Request;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return
#[Route('form', method: ['GET', 'POST'])]
function (
    Request $request
) {
    $this->title = 'Form test';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/default',
    );

    $data = $request->getFormData();
    $name = $data->name->as('?string');

    yield Html::{'main'}(function () use ($name) {
        yield Html::h1('Form test');

        yield Html::{'@fragment'}(
            fragment: '@components/fragments/form',
            action: '/form',
            name: $name
        );
    });
};
