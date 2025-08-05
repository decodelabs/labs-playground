<?php

use DecodeLabs\Greenleaf;
use DecodeLabs\Greenleaf\Route\Page as Route;
use DecodeLabs\Greenleaf\Route\Parameter;
use DecodeLabs\Harvest\Request;
use DecodeLabs\Horizon\Page;
use DecodeLabs\Tagged as Html;

/**
 * @var Page $this
 */

return
#[Route('test-{part1}-{part2}', 'complex-route.php?linear')]
#[Route('test/{part1}/test-{part2}/', 'complex-route.php')]
#[Route('test/{part1}', 'complex-route.php', parameters: [
    new Parameter\Path('part1'),
    new Parameter('part2', default: 'default')
])]
function (
    string $part1,
    string $part2,
    Request $request
) {
    $this->title = 'Complex route test';

    $this->layout = Html::{'@fragment'}(
        fragment: '@components/layouts/default',
    );


    yield Html::{'main'}(function () use ($part1, $part2, $request) {
        yield Html::h1('Complex route test');

        yield Html::{'nav.tabs'}([
            Html::{'a'}(
                content: 'test-{part1}-{part2}',
                href: Greenleaf::url('complex-route.php?linear&part1=foo&part2=bar')
            ),
            Html::{'a'}(
                content: 'test/{part1}/test-{part2}/',
                href: Greenleaf::url('complex-route.php', part1: 'bar', part2: 'baz')
            ),
            Html::{'a'}(
                content: 'test/{part1*}',
                href: Greenleaf::url('complex-route.php', part1: 'foo/bar/baz/test-blops')
            ),
        ]);

        yield Html::{'@dl'}([
            'Slug' => $request->getUri()->getPath(),
            'Part 1' => $part1,
            'Part 2' => $part2,
        ]);
    });
};
