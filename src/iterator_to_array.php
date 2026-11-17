<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\PolyfillPhp82;

if (!function_exists(__NAMESPACE__ . '\\iterator_to_array')) {
    /**
     * @template T
     *
     * @param iterable<T> $iterator
     *
     * @return ($preserve_keys is true ? array<T> : list<T>)
     */
    function iterator_to_array(iterable $iterator, bool $preserve_keys = true): array
    {
        if (\PHP_VERSION_ID >= 8_02_00) {
            /** @var \Traversable<T> $iterator */
            return \iterator_to_array($iterator, $preserve_keys);
        }

        if ($iterator instanceof \Traversable) {
            return \iterator_to_array($iterator, $preserve_keys);
        }

        return $preserve_keys ? $iterator : array_values($iterator);
    }
}
