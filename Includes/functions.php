<?php
/**
 * PHPUnit bootstrap file for tests based on the BrainMonkey testing framework
 *
 * @package itcig/phpunit
 */

namespace Cig\PHPUnit\Includes;

/**
 * Initialize the test suite.
 */
function init_test_suite() {
    check_readiness();

  // Load the Composer autoloader.
    require_once CIG_PHPUNIT_ROOT_DIR . '/vendor/autoload.php';

  // Load Patchwork before everything else in order to allow us to redefine WordPress, 3rd party, or any other non-native PHP functions.
    require_once CIG_PHPUNIT_ROOT_DIR . '/vendor/antecedent/patchwork/Patchwork.php';
}

/**
 * Check the system's readiness to run the tests.
 */
function check_readiness() {
    if (version_compare(phpversion(), '7.1.0', '<')) {
        trigger_error('Test Suite requires PHP 7.1 or higher.', E_USER_ERROR); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
    }

    if (!file_exists(CIG_PHPUNIT_ROOT_DIR . '/vendor/autoload.php')) {
        trigger_error(
            'Whoops, we need Composer before we start running tests.  Please type: `composer install`.  When done, try running `phpunit` again.',
            E_USER_ERROR
        ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
    }
}
