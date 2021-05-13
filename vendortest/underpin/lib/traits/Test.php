<?php
/**
 * Template Loader Trait
 * Handles template loading and template inheritance.
 *
 * @since   1.0.0
 * @package Test\Traits
 */

namespace Test\Traits;

use Test\Abstracts\Test;
use function Test\test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Test-specific Template Trait.
 * Creates templates based off of the location of Test.
 *
 * @since   1.0.0
 * @package test\traits
 */
trait Test_Templates {
	use Templates;

	protected function get_template_root_path() {
		return test()->template_dir();
	}

	protected function get_override_dir() {
		return 'test/';
	}

}