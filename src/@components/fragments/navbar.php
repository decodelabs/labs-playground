<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    yield Html::{'nav.main'}(function() {
        yield Html::{'a'}('Home', href: '/');
        yield Html::{'a'}('Page 2', href: '/page2');
        yield Html::{'a'}('Form test', href: '/form');
        yield Html::{'a'}('Tabs test', href: '/tabs');
    });
};
