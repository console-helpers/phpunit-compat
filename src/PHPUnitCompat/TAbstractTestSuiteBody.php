<?php
/**
 * This file is part of the phpunit-mink library.
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @copyright Alexander Obuhovich <aik.bold@gmail.com>
 * @link      https://github.com/aik099/phpunit-mink
 */

namespace ConsoleHelpers\PHPUnitCompat;


use PHPUnit\Framework\TestResult;

trait TAbstractTestSuiteBody
{

	/**
	 * Runs the tests and collects their result in a TestResult.
	 *
	 * @param TestResult $result Test result.
	 *
	 * @return TestResult
	 */
	public function runCompat($result = null)
	{
		return parent::run($result);
	}

	/**
	 * Template Method that is called after the tests
	 * of this test suite have finished running.
	 */
	protected function tearDownCompat()
	{

	}

}
