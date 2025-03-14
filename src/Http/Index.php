<?php

/**
 * @package DecodeLabs Playground
 * @license http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace DecodeLabs\Playground\Http;

use DecodeLabs\Genesis;
use DecodeLabs\Greenleaf\Action;
use DecodeLabs\Greenleaf\Action\ByMethodTrait;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;
use DecodeLabs\Tagged\Element;
use DecodeLabs\Tagged\Markup;
use DecodeLabs\Zest\Manifest;

class Index implements Action
{
    use ByMethodTrait;

    public function get(): Page
    {
        return new Page(function(Page $page) {
            $path = Genesis::$hub->applicationPath . '/public/assets/zest/.vite/manifest.json';
            $manifest = Manifest::load($path);
            $page->importZestManifest($manifest);

            $page->baseTarget = '_blank';

            $page->title = function() {
                yield 'Hello ';
                yield 'world';
            };

            $page->titleDecorator = function(string $title) {
                return 'Decorated: ' . $title;
            };

            $page->bodyTag->addClass('test');

            $page->applyMeta([
                'description' => 'This is a test page'
            ]);

            $page->addLink(
                key: 'favicon',
                rel: 'icon',
                type: 'image/x-icon',
                href: '/favicon.ico'
            );

            $page->addScript(
                key: 'test',
                src: '/test.js'
            );

            $page->appendHead('test2', Html::link(null, [
                'rel' => 'stylesheet',
                'href' => '/test2.css'
            ]), 2);

            $page->appendHead('test', Html::link(null, [
                'rel' => 'stylesheet',
                'href' => '/test.css'
            ]));

            $page->appendBody('test', Html::footer('This is a test footer'), 1);

            // Layout
            $page->layout = function($content) {
                yield Html::{'template[shadowrootmode=open]'}(function () {
                    yield Html::h1('Hello, world!');

                    yield Html::div(function () {
                        yield Html::{'slot[name=layout]'}();
                    });

                    yield Html::div('FOOTER');
                });

                yield $content;
            };

            // Content
            yield Html::{'main[slot=layout]'}(function () {
                yield Html::{'content-island'}(function (Element $el) {
                    $el->setAttributes([
                        'src' => $this->context->createUrl('/island-content')
                    ]);

                    yield Html::p('This is fallback content!');
                });

                yield Html::{'component-island[vue:src=MyThing]'}(function ($el) {
                    yield Html::div('This is slot content!');
                });

                yield Html::{'component-island[vue:src=AnotherThing]'}(function ($el) {
                    yield Html::div('Fallback content');
                });

                yield Html::{'component-island[react:src=ReactThing]'}(function ($el) {
                    yield Html::div('Fallback content');
                });

                yield Html::{'component-island[react:src=AnotherReactThing]'}(function ($el) {
                    yield Html::div('Fallback content');
                });
            });
        });
    }
}
