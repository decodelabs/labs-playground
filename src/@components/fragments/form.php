<?php

use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element;

return function(
    string $action,
    ?string $name = null
) {
    if($name) {
        yield Html::p('Hello, '.$name);
    }

    yield Html::{'form'}(
        method: 'POST',
        action: $action,
        target: '_self',
        content: function() use($name) {
            yield Html::input(
                type: 'text',
                name: 'name',
                placeholder: 'Name',
                value: $name
            );

            yield Html::input(
                type: 'submit',
                value: 'Submit'
            );
        }
    );
};
