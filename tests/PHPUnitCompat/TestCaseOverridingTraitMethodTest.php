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


use ConsoleHelpers\PHPUnitCompat\AbstractTestCase;

class TestCaseOverridingTraitMethodTest extends AbstractTestCase
{

	public function testPassing()
	{
		echo '[runner version: ' . \PHPUNIT_COMPAT_RUNNER_VERSION . ']';

		$this->assertTrue(true);
	}

	public function testFailing()
	{
		$this->assertFalse(
			true,
			'This test is expected to fail.'
		);
	}

	protected function onNotSuccessfulTestCompat($e)
	{
		echo '[onNotSuccessfulTestCompat called]';
	}

}
