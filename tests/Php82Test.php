<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Tests\PolyfillPhp82;

use Generator;
use function Ibexa\PolyfillPhp82\iterator_to_array;
use PHPUnit\Framework\TestCase;

final class Php82Test extends TestCase
{
    /**
     * @dataProvider provideIteratorToArray
     *
     * @param iterable<mixed> $iterator
     * @param array<mixed> $expected
     */
    public function testIteratorToArray(iterable $iterator, bool $preserveKeys, array $expected): void
    {
        self::assertSame($expected, iterator_to_array($iterator, $preserveKeys));
    }

    /**
     * @return iterable<string, array{iterable<mixed>, bool, array<mixed>}>
     */
    public static function provideIteratorToArray(): iterable
    {
        $items = [
            'foo' => 'bar',
            42 => 'baz',
        ];

        yield 'array, preserving keys' => [$items, true, $items];
        yield 'array, not preserving keys' => [$items, false, ['bar', 'baz']];
        yield 'generator, preserving keys' => [self::generate($items), true, $items];
        yield 'generator, not preserving keys' => [self::generate($items), false, ['bar', 'baz']];
    }

    public function testDeclarationFileCanBeLoadedTwice(): void
    {
        require dirname(__DIR__) . '/src/iterator_to_array.php';

        self::assertTrue(function_exists('Ibexa\PolyfillPhp82\iterator_to_array'));
    }

    /**
     * @param array<mixed> $items
     *
     * @return \Generator<mixed>
     */
    private static function generate(array $items): Generator
    {
        yield from $items;
    }
}
