<?php

namespace Cig\PHPUnit;

use Brain\Monkey;
use Cig\PHPUnit\Includes\ExpectOutputHelper;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase {
  use ExpectOutputHelper;

  // Adds Mockery expectations to the PHPUnit assertions count.
  use MockeryPHPUnitIntegration;

  protected function setUp(): void {
    parent::setUp();
    Monkey\setUp();
  }

  protected function tearDown(): void {
    Monkey\tearDown();
    parent::tearDown();
  }
}
