<?php
/**
 * Bootstrap PHPUnit integration tests
 *
 * @package itcig/phpunit
 */

namespace CIG\PHPUnit\Integration;

use CIG\PHPUnit\BootstrapManager;

use function Cig\PHPUnit\Includes\init_test_suite;

init_test_suite();

/**
 * Bootstraps the integration testing environment with WordPress.
 */
function bootstrap_integration_suite() {
  // Bootstrap the plugin.
    if (is_readable(CIG_PHPUNIT_ROOT_TEST_DIR . '/bootstrap.php')) {
        require_once CIG_PHPUNIT_ROOT_TEST_DIR . '/bootstrap.php';
    }
}

bootstrap_integration_suite();
