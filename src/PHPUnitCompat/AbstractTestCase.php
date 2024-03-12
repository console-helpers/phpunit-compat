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


use PHPUnit\Runner\Version;

// PHPUnit Compat.
if ( \class_exists('\PHPUnit_Framework_IncompleteTestError') ) {
	\class_alias(
		'\PHPUnit_Framework_IncompleteTestError',
		'\ConsoleHelpers\PHPUnitCompat\Framework\IncompleteTestError'
	);
}
else {
	\class_alias(
		'\PHPUnit\Framework\IncompleteTestError',
		'\ConsoleHelpers\PHPUnitCompat\Framework\IncompleteTestError'
	);
}

if ( class_exists('\PHPUnit_Framework_SkippedTestError') ) {
	\class_alias('\PHPUnit_Framework_SkippedTestError', '\ConsoleHelpers\PHPUnitCompat\Framework\SkippedTestError');
}
else {
	\class_alias('\PHPUnit\Framework\SkippedTestError', '\ConsoleHelpers\PHPUnitCompat\Framework\SkippedTestError');
}

if ( class_exists('\PHPUnit_Framework_TestSuite_DataProvider') ) {
	\class_alias(
		'\PHPUnit_Framework_TestSuite_DataProvider',
		'\ConsoleHelpers\PHPUnitCompat\Framework\DataProviderTestSuite'
	);
}
else {
	\class_alias(
		'\PHPUnit\Framework\DataProviderTestSuite',
		'\ConsoleHelpers\PHPUnitCompat\Framework\DataProviderTestSuite'
	);
}

if ( class_exists('\PHPUnit_Framework_TestResult') ) {
	\class_alias('\PHPUnit_Framework_TestResult', '\ConsoleHelpers\PHPUnitCompat\Framework\TestResult');
}
else {
	\class_alias('\PHPUnit\Framework\TestResult', '\ConsoleHelpers\PHPUnitCompat\Framework\TestResult');
}

if ( class_exists('\PHPUnit_Framework_Test') ) {
	\class_alias('\PHPUnit_Framework_Test', '\ConsoleHelpers\PHPUnitCompat\Framework\Test');
}
else {
	\class_alias('\PHPUnit\Framework\Test', '\ConsoleHelpers\PHPUnitCompat\Framework\Test');
}

if ( !\defined('PHPUNIT_COMPAT_RUNNER_VERSION') ) {
	if ( \class_exists('PHPUnit\Runner\Version') ) {
		\define('PHPUNIT_COMPAT_RUNNER_VERSION', Version::id());
	}
	else {
		\define('PHPUNIT_COMPAT_RUNNER_VERSION', \PHPUnit_Runner_Version::id());
	}
}

// CodeCoverage Compat.
if ( class_exists('\PHP_CodeCoverage') ) {
	\class_alias('\PHP_CodeCoverage', '\ConsoleHelpers\CodeCoverageCompat\CodeCoverage');
}
else {
	\class_alias(
		'\SebastianBergmann\CodeCoverage\CodeCoverage',
		'\ConsoleHelpers\CodeCoverageCompat\CodeCoverage'
	);
}

if ( \interface_exists('\PHP_CodeCoverage_Driver') ) {
	\class_alias('\PHP_CodeCoverage_Driver', '\ConsoleHelpers\CodeCoverageCompat\Driver\Driver');
}
else {
	\class_alias(
		'\SebastianBergmann\CodeCoverage\Driver\Driver',
		'\ConsoleHelpers\CodeCoverageCompat\Driver\Driver'
	);
}

if ( class_exists('\PHP_CodeCoverage_Filter') ) {
	\class_alias('\PHP_CodeCoverage_Filter', '\ConsoleHelpers\CodeCoverageCompat\Filter');
}
else {
	\class_alias('\SebastianBergmann\CodeCoverage\Filter', '\ConsoleHelpers\CodeCoverageCompat\Filter');
}


trait TAbstractTestCaseBody
{

	/**
	 * This method is called when a test method did not execute successfully.
	 *
	 * @param \Exception|\Throwable $e Exception.
	 *
	 * @return void
	 */
	protected function onNotSuccessfulTestCompat($e)
	{

	}

}

if ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '5.0.0', '<') ) {
	require_once __DIR__ . '/AbstractTestCase4.php';
}
elseif ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '6.0.0', '<') ) {
	require_once __DIR__ . '/AbstractTestCase5.php';
}
elseif ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '7.0.0', '<') ) {
	require_once __DIR__ . '/AbstractTestCase6.php';
}
elseif ( version_compare(\PHPUNIT_COMPAT_RUNNER_VERSION, '8.0.0', '<') ) {
	require_once __DIR__ . '/AbstractTestCase7.php';
}
else {
	require_once __DIR__ . '/AbstractTestCase8.php';
}
