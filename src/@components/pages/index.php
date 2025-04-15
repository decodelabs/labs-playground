<?php

use DecodeLabs\Greenleaf\Route\Parameter;
use DecodeLabs\Greenleaf\Route\Page as Route;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return
#[Route('/', 'index', parameters: [
    new Parameter('test', default: 'hello')
])]
function(
    string $test
) {
    $this->title = 'Fabric Starter';

    $this->setMetas(
        description: 'This is a test page',
        keywords: 'test, fabric, starter',
    );

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/default',
    );

    // Content
    yield Html::{'main'}(function () use($test) {
        yield Html::h2('Welcome to Fabric Starter');

        yield Html::p('Param: '.$test);

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
            propagate: true,
            content: Html::div('Fallback content')
        );

        yield Html::{'component-island'}(
            name: 'AnotherReactThing',
            props: ['says' => 'this is neat'],
            content: Html::div('Fallback content')
        );
    });
};
