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


use ConsoleHelpers\PHPUnitCompat\AbstractTestSuite;

class TestSuiteWithOverrideFixture extends AbstractTestSuite
{

	/**
	 * @inheritDoc
	 */
	public function runCompat($result = null)
	{
		$result = parent::runCompat($result);

		echo '[runCompat called]';

		return $result;
	}

	/**
	 * @inheritDoc
	 */
	protected function tearDownCompat()
	{
		echo '[tearDownCompat called]';
	}

}
