# CIG PHPUnit Testing

## Install

```php
/**
 * Initializes the itcig/phpunit handler, which then calls the unit test suite.
 */

define('CIG_PHPUNIT_ROOT_DIR', dirname(dirname(__DIR__)));
define('CIG_PHPUNIT_ROOT_TEST_DIR', __DIR__);

require_once CIG_PHPUNIT_ROOT_DIR . '/Unit/bootstrap.php';
```
