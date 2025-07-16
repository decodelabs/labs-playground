<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function () {
    $this->title = 'Tabs test';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/test',
    );

    yield Html::{'main'}(function () {
        yield Html::h1('Tabs test');

        yield Html::{'nav.tabs'}(function () {
            yield Html::{'a.tab'}(
                href: '/fragments/tab/1',
                content: 'Tab 1',
                target: 'tab-fragment'
            );

            yield Html::{'a.tab'}(
                href: '/fragments/tab/2',
                content: 'Tab 2',
                target: 'tab-fragment'
            );

            yield Html::{'a.tab'}(
                href: '/fragments/tab/3',
                content: 'Tab 3',
                target: 'tab-fragment'
            );
        });

        yield Html::{'fragment-island'}(
            src: '/fragments/tab/1',
            name: 'tab-fragment',
            content: Html::p('This is fallback content!')
        );
    });
};
