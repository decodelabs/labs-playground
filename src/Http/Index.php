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
            $page->importZestManifest(
                Manifest::load(
                    Genesis::$hub->applicationPath . '/public/assets/zest/.vite/manifest.json'
                )
            );

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

            // Layout
            $page->layout = function($content) {
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

            // Content
            yield Html::{'page-island'}(function () {
                yield Html::{'fragment-island'}(function (Element $el) {
                    $el->setAttributes([
                        'src' => $this->context->createUrl('/island-content')
                    ]);

                    yield Html::p('This is fallback content!');
                });

                yield Html::{'component-island[name=MyThing]'}(function ($el) {
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
        });
    }
}
