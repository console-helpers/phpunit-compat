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


use PHPUnit\Framework\TestCase;

// @codeCoverageIgnoreStart
if ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '5.0.0', '<') ) {
	/**
	 * Implementation for PHPUnit 4
	 */
	abstract class AbstractTestCase extends TestCase
	{

		use TAbstractTestCaseBody;

		/**
		 * @inheritDoc
		 */
		protected function onNotSuccessfulTest(\Exception $e)
		{
			$this->onNotSuccessfulTestCompat($e);

			parent::onNotSuccessfulTest($e);
		}

	}
}
elseif ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '6.0.0', '<') ) {
	/**
	 * Implementation for PHPUnit 5
	 */
	abstract class AbstractTestCase extends TestCase
	{

		use TAbstractTestCaseBody;

		/**
		 * @inheritDoc
		 */
		protected function onNotSuccessfulTest($e)
		{
			$this->onNotSuccessfulTestCompat($e);

			parent::onNotSuccessfulTest($e);
		}

	}
}
// @codeCoverageIgnoreEnd
