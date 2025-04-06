<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function(
    ?string $name = null
) {
    $this->title = 'Form test';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/default',
    );

    yield Html::{'main'}(function () use($name) {
        yield Html::h1('Form test');

        yield Html::{'@fragment'}(
            fragment: '@components/fragments/form',
            action: '/form',
            name: $name
        );
    });
};
