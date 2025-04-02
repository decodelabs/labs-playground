<?php

use DecodeLabs\Genesis;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element;
use DecodeLabs\Zest\Manifest;

/**
 * @var Page $this
 */

return function(
    mixed $content
): mixed {
    // Zest
    $this->importZestManifest(
        Manifest::load(
            Genesis::$hub->applicationPath . '/public/assets/zest/.vite/manifest.json'
        )
    );

    // Title
    $this->titleDecorator = fn(string $title) => $title.' - Labs Playground';

    // Favicon
    $this->addLink(
        key: 'favicon',
        rel: 'icon',
        type: 'image/x-icon',
        href: '/favicon.ico'
    );

    yield Html::h1('Hello, world!');

    yield Html::header(function() {
        yield Html::nav(function() {
            yield Html::{'a'}('Home', [
                'href' => '/'
            ]);

            yield Html::{'a'}('Island content', [
                'href' => '/island-content'
            ]);
        });

        yield Html::{'component-island[name=AnotherThing]'}(function (Element $el) {
            yield Html::div('Fallback content');

            $el->setAttribute('props', json_encode([
                'action' => 'rocks'
            ]));
        });
    });

    yield Html::div($content);

    yield Html::div('FOOTER');
};
