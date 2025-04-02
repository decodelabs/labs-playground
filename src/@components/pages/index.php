<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element as El;

/**
 * @var Page $this
 */

return function(): mixed {
    $this->title = 'Fabric Starter';

    $this->setMetas(
        description: 'This is a test page',
        keywords: 'test, fabric, starter',
    );

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );


    // Content
    yield Html::{'page-island'}(function () {
        yield Html::{'fragment-island'}(function (El $el) {
            $el->setAttributes(
                src:  '/island-content'
            );

            yield Html::p('This is fallback content!');
        });

        yield Html::{'component-island[name=MyThing]'}(function () {
            yield Html::div('Fallback content!');
        });

        yield Html::{'component-island[name=ReactThing]'}(function (El $el) {
            yield Html::div('Fallback content');

            $el->setAttribute('props', json_encode([
                'test' => 'test'
            ]));
        });

        yield Html::{'component-island[name=AnotherReactThing]'}(function (El $el) {
            yield Html::div('Fallback content');

            $el->setAttribute('props', json_encode([
                'says' => 'this is neat'
            ]));
        });
    });
};
