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

if ( \class_exists('ConsoleHelpers\PHPUnitCompat\Autoload', false) === false ) {

	/**
	 * Custom autoloader.
	 */
	final class Autoload
	{

		/**
		 * PHPUnit version.
		 *
		 * @var string
		 */
		protected static $phpUnitVersion;

		/**
		 * Loads a class.
		 *
		 * @param string $class_name The name of the class to load.
		 *
		 * @return boolean
		 */
		public static function load($class_name)
		{
			// Only load classes belonging to this library.
			if ( \stripos($class_name, 'ConsoleHelpers\PHPUnitCompat') !== 0 ) {
				return false;
			}

			switch ( $class_name ) {
				case 'ConsoleHelpers\PHPUnitCompat\AbstractTestCase':
					self::defineAliases();

					$phpunit_version = self::getPhpUnitVersion();

					if ( version_compare($phpunit_version, '5.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestCase4.php';
					}
					elseif ( version_compare($phpunit_version, '6.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestCase5.php';
					}
					elseif ( version_compare($phpunit_version, '7.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestCase6.php';
					}
					elseif ( version_compare($phpunit_version, '8.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestCase7.php';
					}
					else {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestCase8.php';
					}

					return true;

				case 'ConsoleHelpers\PHPUnitCompat\AbstractTestSuite':
					$phpunit_version = self::getPhpUnitVersion();

					if ( version_compare($phpunit_version, '5.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestSuite4.php';
					}
					elseif ( version_compare($phpunit_version, '6.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestSuite5.php';
					}
					elseif ( version_compare($phpunit_version, '7.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestSuite6.php';
					}
					elseif ( version_compare($phpunit_version, '8.0.0', '<') ) {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestSuite7.php';
					}
					else {
						require_once __DIR__ . '/src/PHPUnitCompat/AbstractTestSuite8.php';
					}

					return true;

				/*
				 * Handles:
				 * - ConsoleHelpers\PHPUnitCompat\TAbstractTestCaseBody
				 * - ConsoleHelpers\PHPUnitCompat\TAbstractTestSuiteBody
				 */
				default:
					$file = \realpath(__DIR__ . '/src/' . \strtr(\substr($class_name, 15), '\\', '/') . '.php');

					if ( \is_string($file) && \file_exists($file) === true ) {
						require_once $file;

						return true;
					}
			}

			return false;
		}

		/**
		 * Get PHPUnit version.
		 *
		 * @return string
		 */
		protected static function getPhpUnitVersion()
		{
			if ( self::$phpUnitVersion === null ) {
				if ( \class_exists('PHPUnit\Runner\Version') ) {
					self::$phpUnitVersion = Version::id();
				}
				else {
					self::$phpUnitVersion = \PHPUnit_Runner_Version::id();
				}
			}

			return self::$phpUnitVersion;
		}

		/**
		 * Defines aliases.
		 *
		 * @return void
		 */
		protected static function defineAliases()
		{
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
		}

	}

	\spl_autoload_register(__NAMESPACE__ . '\Autoload::load');
}
