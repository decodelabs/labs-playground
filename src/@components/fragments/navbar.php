<?php

use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return function() {
    yield Html::{'nav.main'}(function() {
        yield Html::{'a'}('Home', href: '/');
        yield Html::{'a'}('Island content', href: '/page2');
        yield Html::{'a'}('Form test', href: '/form');
    });
};
