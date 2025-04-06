<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    $this->title = 'Page 2';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );

    yield Html::{'main'}(function () {
        yield Html::h2('Page 2 content');

        yield Html::{'fragment-island'}(
            src:  '/fragments/island-content',
            content: Html::p('This is fallback content!')
        );

        yield Html::{'component-island'}(
            name: 'ReactThing',
            props: ['test' => 'test'],
            content: Html::div('Fallback content')
        );

        yield Html::{'component-island'}(
            name: 'MyThing',
            content: Html::div('Fallback content!')
        );
    });
};
