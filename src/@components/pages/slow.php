<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function () {
    $this->title = 'Slow content';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );

    sleep(1);

    yield Html::{'main'}(function () {
        yield Html::h2('Slow content');
        yield Html::p('This content takes a second to load');
    });
};
