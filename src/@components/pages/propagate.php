<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    $this->title = 'Propagate test';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );

    yield Html::{'main'}(function () {
        yield Html::h2('Components propagation test');

        yield Html::{'fragment-island'}(
            src:  '/fragments/island-content',
            content: Html::p('This is fallback content!')
        );

        yield Html::{'component-island'}(
            name: 'ReactThing',
            props: ['test' => 'a different value'],
            propagate: true,
            content: Html::div('Fallback content')
        );

        yield Html::{'component-island'}(
            name: 'MyThing',
            content: Html::div('Fallback content!')
        );
    });
};
