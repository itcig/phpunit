<?php

namespace Cig\PHPUnit\Integration;

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

  /**
   * Stub the WP native escaping functions.
   *
   * The stubs created by this function return the original input string unchanged.
   *
   * Alternative to the BrainMonkey `Monkey\Functions\stubTranslationFunctions()` function
   * which does apply some form of escaping to the input if the function called is a
   * "translate and escape" function.
   *
   * @return void
   */
  public function stubTranslationFunctions() {
    Functions\stubs([
      '__' => null,
      '_x' => null,
      '_n' => static function ($single, $plural, $number) {
        return $number === 1 ? $single : $plural;
      },
      '_nx' => static function ($single, $plural, $number) {
        return $number === 1 ? $single : $plural;
      },
      'translate' => null,
      'esc_html__' => null,
      'esc_html_x' => null,
      'esc_attr__' => null,
      'esc_attr_x' => null,
    ]);

    Functions\when('_e')->echoArg();
    Functions\when('_ex')->echoArg();
    Functions\when('esc_html_e')->echoArg();
    Functions\when('esc_attr_e')->echoArg();
  }

  /**
   * Stub the WP native escaping functions.
   *
   * The stubs created by this function return the original input string unchanged.
   *
   * Alternative to the BrainMonkey `Monkey\Functions\stubEscapeFunctions()` function
   * which does apply some form of escaping to the input.
   *
   * @return void
   */
  public function stubEscapeFunctions() {
    Functions\stubs(['esc_js', 'esc_sql', 'esc_attr', 'esc_html', 'esc_textarea', 'esc_url', 'esc_url_raw', 'esc_xml']);
  }
}
