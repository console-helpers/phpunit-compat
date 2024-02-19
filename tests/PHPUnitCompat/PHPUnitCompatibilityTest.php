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


use ConsoleHelpers\PHPUnitCompat\AbstractPHPUnitCompatibilityTestCase;

class PHPUnitCompatibilityTest extends AbstractPHPUnitCompatibilityTestCase
{

	public function testPassing()
	{
		$this->assertTrue(true);
	}

	public function testFailing()
	{
		$this->fail('This test is expected to fail.');
	}

}
