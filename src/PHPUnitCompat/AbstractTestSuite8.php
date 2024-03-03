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
use PHPUnit\Framework\TestSuite;

/**
 * Implementation for PHPUnit 8+
 */
abstract class AbstractTestSuite extends TestSuite
{

	use TAbstractTestSuiteBody;

	/**
	 * @inheritDoc
	 */
	public function run(TestResult $result = null): TestResult
	{
		return $this->runCompat($result);
	}

	/**
	 * For PHPUnit < 8.2.0.
	 *
	 * @inheritDoc
	 */
	protected function tearDown(): void
	{
		$this->tearDownCompat();
	}

}
