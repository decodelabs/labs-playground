<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    yield Html::{'nav.main'}(function() {
        yield Html::{'a'}('Home', href: '/');
        yield Html::{'a'}('Propagation test', href: '/propagate');
        yield Html::{'a'}('Form test', href: '/form');
        yield Html::{'a'}('Slow page', href: '/slow', loading: 'page-load');
        yield Html::{'a'}('Tabs test', href: '/tabs');
    });
};
