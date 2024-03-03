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

/**
 * Implementation for PHPUnit 7
 */
abstract class AbstractTestCase extends TestCase
{

	use TAbstractTestCaseBody;

	/**
	 * @inheritDoc
	 */
	protected function onNotSuccessfulTest(\Throwable $t)/* The :void return type declaration that should be here would cause a BC issue */
	{
		$this->onNotSuccessfulTestCompat($t);

		parent::onNotSuccessfulTest($t);
	}

}
