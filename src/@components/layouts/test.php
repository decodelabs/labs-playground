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

    yield Html::{'layout-island[name=test]'}(function () use($content) {
        yield Html::header(function() {
            yield Html::h1('Test layout');

            yield Html::nav(function() {
                yield Html::{'a'}('Home', href: '/');
                yield Html::{'a'}('Island content', href: '/page2');
            });

            yield Html::{'component-island'}(
                name: 'AnotherThing',
                props: [
                    'action' => 'makes me happy'
                ],
                content: Html::div('Fallback content')
            );
        });

        yield Html::{'page-island'}($content);

        yield Html::footer('FOOTER');
    });
};
