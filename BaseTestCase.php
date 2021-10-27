<?php
/**
 * Foundation to build custom PHPUnit TestCase objects upon
 *
 * @package itcig/phpunit
 */

namespace Cig\PHPUnit;

use Brain\Monkey;
use Cig\PHPUnit\Includes\ExpectOutputHelper;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseTestCase
 */
class BaseTestCase extends TestCase {
    use ExpectOutputHelper;

  // Adds Mockery expectations to the PHPUnit assertions count.
    use MockeryPHPUnitIntegration;

  /**
   * This method is called before each test.
   */
    protected function setUp(): void {
        parent::setUp();
        Monkey\setUp();
    }

  /**
   * This method is called after each test.
   */
    protected function tearDown(): void {
        Monkey\tearDown();
        parent::tearDown();
    }
}
