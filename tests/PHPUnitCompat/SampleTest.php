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

final class SampleTest extends TestCase
{

	/**
	 * @covers \ConsoleHelpers\PHPUnitCompat\TAbstractTestSuiteBody
	 *
	 * @return void
	 */
	public function testSuccess()
	{
		$this->assertTrue(true);
	}

}
