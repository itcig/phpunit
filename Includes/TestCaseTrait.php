<?php
/**
 * Common methods shared across different TestCase objects
 *
 * @package itcig/phpunit
 */

namespace Cig\PHPUnit\Includes;

/**
 * Trait TestCaseTrait
 */
trait TestCaseTrait {
  /**
   * Gets the test data, if it exists, for a specific test class.
   *
   * @param string $dir Directory of the test class.
   * @param string $filename Test data filename without the .php extension.
   *
   * @return array array of test data.
   */
    protected function get_test_data($dir, $filename) {
        if (empty($dir) || empty($filename)) {
            return [];
        }

        $dir = str_replace(['Integration', 'Unit'], 'Fixtures', $dir);
        $dir = rtrim($dir, '\\/');
        $testdata = "$dir/{$filename}.php";

        return is_readable($testdata) ? require $testdata : [];
    }

  /**
   * Get a private or protected property
   *
   * @param string|mixed $class Class name or instance to get property from.
   * @param string       $property_name class property name.
   *
   * @return mixed the value of the property
   * @since 1.0.0
   */
    public static function get_property($class, $property_name) {
        if (!$property_name) {
            return;
        }

        $reflection = new \ReflectionClass($class);

        $property = $reflection->getProperty($property_name);
        $property->setAccessible(true);

        return $property->getValue($class);
    }

  /**
   * Set a private or protected property
   *
   * @param string|mixed $instance Class instance to set property.
   * @param string       $property_name class property name.
   * @param mixed        $value desired property value.
   *
   * @return ReflectionProperty|string
   * @throws ReflectionException Throws an exception if property does not exist.
   */
    public static function set_property($instance, $property_name, $value) {
        if (!$property_name) {
            return;
        }

        $reflection = new \ReflectionClass($instance);

        $property = $reflection->getProperty($property_name);
        $property->setAccessible(true);

        return $property->setValue($instance, $value);
    }

  /**
   * Get reflective access to the private/protected method.
   *
   * @param string|mixed $class Class name or instance whose method will be invoked.
   * @param string       $method_name Name of the method.
   *
   * @return ReflectionMethod
   */
    public static function get_method($class, $method_name) {
        if (!$method_name) {
            return;
        }

        $reflection = new \ReflectionClass($class);

        $method = $reflection->getMethod($method_name);
        $method->setAccessible(true);

        return $method;
    }

  /**
   * Invoke a protected method in an object.
   *
   * @param string|mixed $class Class name or instance whose method will be invoked.
   * @param string       $method_name Name of the method to invoke.
   * @param array        $args Arguments for the method.
   *
   * @return mixed Result from the method invocation.
   * @throws ReflectionException Error when dealing with reflection.
   */
    public static function invoke_protected($class, $method_name, $args) {
        return self::get_method($class, $method_name)->invokeArgs($class, $args);
    }

  /**
   * Format the HTML by stripping out the whitespace between the HTML tags and then putting each tag on a separate
   * line.
   *
   * Why? We can then compare the actual vs. expected HTML patterns without worrying about tabs, new lines, and extra
   * spaces.
   *
   * @param string $html HTML to strip.
   *
   * @return string stripped HTML.
   */
    protected function format_the_html($html) {
        $html = trim($html);

      // Strip whitespace between the tags.
        $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', $html);

      // Strip whitespace at the end of a tag.
        $html = preg_replace('/(\>)\s*/m', '$1$2', $html);

      // Strip whitespace at the start of a tag.
        $html = preg_replace('/\s*(\<)/m', '$1$2', $html);

        return str_replace('>', ">\n", $html);
    }
}
