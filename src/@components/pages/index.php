<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element;

/**
 * @var Page $this
 */

return function(): mixed {
    $this->title = function() {
        yield 'Hello ';
        yield 'world';
    };

    $this->bodyTag->addClass('test');

    $this->applyMeta([
        'description' => 'This is a test page'
    ]);

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );


    // Content
    yield Html::{'page-island'}(function () {
        yield Html::{'fragment-island'}(function (Element $el) {
            $el->setAttributes([
                'src' => '/island-content'
            ]);

            yield Html::p('This is fallback content!');
        });

        yield Html::{'component-island[name=MyThing]'}(function () {
            yield Html::div('Fallback content!');
        });

        yield Html::{'component-island[name=ReactThing]'}(function (Element $el) {
            yield Html::div('Fallback content');

            $el->setAttribute('props', json_encode([
                'test' => 'test'
            ]));
        });

        yield Html::{'component-island[name=AnotherReactThing]'}(function (Element $el) {
            yield Html::div('Fallback content');

            $el->setAttribute('props', json_encode([
                'says' => 'this is neat'
            ]));
        });
    });
};
