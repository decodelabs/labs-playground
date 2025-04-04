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

        if($name) {
            yield Html::p('Hello, '.$name);
        }

        yield Html::{'form'}(
            method: 'POST',
            action: '/form',
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
    });
};
