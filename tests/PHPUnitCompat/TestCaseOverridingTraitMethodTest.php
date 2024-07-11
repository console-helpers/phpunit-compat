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
use PHPUnit\Runner\Version;

class TestCaseOverridingTraitMethodTest extends AbstractTestCase
{

	public function testPassing()
	{
		echo '[runner version: ' . $this->getPhpUnitVersion() . ']';

		$this->assertTrue(true);
	}

	/**
	 * Get PHPUnit version.
	 *
	 * @return string
	 */
	protected function getPhpUnitVersion()
	{
		if ( \class_exists('PHPUnit\Runner\Version') ) {
			return Version::id();
		}

		return \PHPUnit_Runner_Version::id();
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
