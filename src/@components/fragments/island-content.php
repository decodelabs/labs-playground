<?php

use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element;

return function (): mixed {
    yield Html::p('This is fragment content!');

    yield Html::{'component-island[name=AnotherReactThing]'}(function (Element $el) {
        yield Html::div('Fallback content');

        $el->setAttribute('props', json_encode([
            'says' => 'this is nested!'
        ]));
    });
};
