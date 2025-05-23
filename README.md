Ibexa PHP 8.2 Polyfill Package
====================

This package provides access to functions not otherwise provided by Symfony Polyfills.

To use it in your project, add it using Composer:
⏩ `composer require ibexa/polyfill-php82`

Then you can use functions provided by the package by importing them:
```php
use Ibexa\PolyfillPhp82\iterator_to_array;

// Now we can use `iterator_to_array` function (although namespaced) as if it was
// with PHP 8.2 functionality (extended arguments)
$anyIterable = ['some_simple_array_which_would_not_work_in_php_82'];
$array = iterator_to_array($anyIterable);

```

## COPYRIGHT
Copyright (C) 1999-2025 Ibexa AS (formerly eZ Systems AS). All rights reserved.

## LICENSE

This source code is available separately under the following licenses:

A - Ibexa Business Use License Agreement (Ibexa BUL),
version 2.4 or later versions (as license terms may be updated from time to time)
Ibexa BUL is granted by having a valid Ibexa DXP (formerly eZ Platform Enterprise) subscription,
as described at: https://www.ibexa.co/product
For the full Ibexa BUL license text, please see:
https://www.ibexa.co/software-information/licenses-and-agreements (latest version applies)

AND

B - GNU General Public License, version 2
Grants an copyleft open source license with ABSOLUTELY NO WARRANTY. For the full GPL license text, please see:
https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
