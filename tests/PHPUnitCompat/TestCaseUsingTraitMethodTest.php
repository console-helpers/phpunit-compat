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

class TestCaseUsingTraitMethodTest extends AbstractTestCase
{

	public function testPassing()
	{
		$this->assertTrue(true);
	}

	/**
	 * @covers \ConsoleHelpers\PHPUnitCompat\TAbstractTestCaseBody
	 */
	public function testFailing()
	{
		$this->assertFalse(
			true,
			'This test is expected to fail.'
		);
	}

}
