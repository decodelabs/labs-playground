<?php

use DecodeLabs\Greenleaf;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    yield Html::{'nav.main'}(function() {
        yield Html::{'a'}(
            content: 'Home',
            href: Greenleaf::url('index.php')
        );

        yield Html::{'a'}(
            content: 'Propagation test',
            href: Greenleaf::url('propagate.php')
        );

        yield Html::{'a'}(
            content: 'Form test',
            href: Greenleaf::url('form.php')
        );

        yield Html::{'a'}(
            content: 'Complex route test',
            href: Greenleaf::url('complex-route.php', part1: 'foo', part2: 'bar')
        );

        yield Html::{'a'}(
            content: 'Slow page',
            href: '/slow',
            loading: 'page-load'
        );

        yield Html::{'a'}(
            content: 'Tabs test',
            href: '/tabs'
        );
    });
};
