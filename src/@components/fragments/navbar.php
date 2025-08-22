<?php

use DecodeLabs\Greenleaf;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function (
    Greenleaf $greenleaf
) {
    yield Html::{'nav.main'}(function () use ($greenleaf) {
        yield Html::{'a'}(
            content: 'Home',
            href: $greenleaf->url('index.php')
        );

        yield Html::{'a'}(
            content: 'Propagation test',
            href: $greenleaf->url('propagate.php')
        );

        yield Html::{'a'}(
            content: 'Form test',
            href: $greenleaf->url('form.php')
        );

        yield Html::{'a'}(
            content: 'Complex route test',
            href: $greenleaf->url('complex-route.php', part1: 'foo', part2: 'bar')
        );

        yield Html::{'a'}(
            content: 'Slow page',
            href: $greenleaf->url('slow.php'),
            loading: 'page-load'
        );

        yield Html::{'a'}(
            content: 'Tabs test',
            href: $greenleaf->url('tabs.php')
        );
    });
};
