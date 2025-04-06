<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    $this->title = 'Fabric Starter';

    $this->setMetas(
        description: 'This is a test page',
        keywords: 'test, fabric, starter',
    );

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/default',
    );

    // Content
    yield Html::{'main'}(function () {
        yield Html::{'fragment-island'}(
            src:  '/fragments/island-content',
            content: Html::p('This is fallback content!')
        );

        yield Html::{'component-island'}(
            name: 'MyThing',
            content: Html::div('Fallback content!')
        );

        yield Html::{'component-island'}(
            name: 'ReactThing',
            props: ['test' => 'test'],
            content: Html::div('Fallback content')
        );

        yield Html::{'component-island'}(
            name: 'AnotherReactThing',
            props: ['says' => 'this is neat'],
            content: Html::div('Fallback content')
        );
    });
};
