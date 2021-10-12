<?php
/**
 * Bootstrap PHPUnit unit tests
 *
 * @package itcig/phpunit
 */

namespace Cig\PHPUnit\Unit;

use function Cig\PHPUnit\Includes\init_test_suite;

define('CIG_PHPUNIT_ROOT_TEST_DIR', dirname(__DIR__));

require_once dirname(__DIR__) . '/Includes/functions.php';
init_test_suite();

// Bootstrap the plugin.
if (is_readable(CIG_PHPUNIT_ROOT_TEST_DIR . '/bootstrap.php')) {
    require_once CIG_PHPUNIT_ROOT_TEST_DIR . '/bootstrap.php';
}
