<?php

namespace Cig\PHPUnit\Unit;

use Cig\PHPUnit\BaseTestCase;
use Cig\PHPUnit\Includes\TestCaseTrait;

abstract class TestCase extends BaseTestCase {
  use TestCaseTrait;

  /**
   * Prepares the test environment before test class runs.
   */
  public static function setUpBeforeClass(): void {
  }

  /**
   * Prepares the test environment before each test.
   */
  protected function setUp(): void {
    parent::setUp();
  }

  /**
   * Cleans up the test environment after each test.
   */
  protected function tearDown(): void {
    parent::tearDown();
  }
}
