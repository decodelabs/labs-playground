<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function(
    mixed $content
) {
    // Zest
    $this->decorate('Zest');

    // Title
    $this->titleDecorator = fn(string $title) => $title.' - Labs Playground';

    // Favicon
    $this->addLink(
        key: 'favicon',
        rel: 'icon',
        type: 'image/x-icon',
        href: '/favicon.ico'
    );

    yield Html::header(function() {
        yield Html::h1('Hello, world!');

        yield Html::{'@fragment'}(
            fragment: '@components/fragments/navbar'
        );

        yield Html::{'component-island'}(
            name: 'AnotherThing',
            props: [
                'action' => 'rocks'
            ],
            content: Html::div('Fallback content')
        );
    });

    yield Html::{'page-island'}($content);

    yield Html::footer('FOOTER');
};
