<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

return function(
    string $tab,
    ?string $name = null
) {
    yield Html::{'div.tab'}(function() use($tab, $name) {
        yield Html::h2('Tab '.$tab);
        yield Html::p('This is the content for tab '.$tab.'.');

        yield Html::a(
            content: 'Click me',
            href: '/fragments/island-content',
            target: '_parent'
        );

        if($tab === '3') {
            yield Html::{'@fragment'}(
                fragment: '@components/fragments/form',
                action: '/fragments/tab/3',
                name: $name
            );
        }
    });
};
