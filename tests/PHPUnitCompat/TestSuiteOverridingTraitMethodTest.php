<?php
/**
 * This file is part of the PHPUnit-Compat library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/console-helpers/phpunit-compat
 */

namespace Tests\ConsoleHelpers\PHPUnitCompat;


use PHPUnit\Framework\TestCase;

final class TestSuiteOverridingTraitMethodTest extends TestCase
{

	public static function suite()
	{
		$test_case_reflection = new \ReflectionClass(SampleTest::class);

		$test_suite = new TestSuiteFixture($test_case_reflection);

		return $test_suite;
	}

}
