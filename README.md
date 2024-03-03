# PHPUnit-Compat

[![CI](https://github.com/console-helpers/phpunit-compat/actions/workflows/tests.yml/badge.svg)](https://github.com/console-helpers/phpunit-compat/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/console-helpers/phpunit-compat/graph/badge.svg?token=Jpe8mEgXLQ)](https://codecov.io/gh/console-helpers/phpunit-compat)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/console-helpers/phpunit-compat/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/console-helpers/phpunit-compat/?branch=master)


[![Latest Stable Version](https://poser.pugx.org/console-helpers/phpunit-compat/v/stable)](https://packagist.org/packages/console-helpers/phpunit-compat)
[![Total Downloads](https://poser.pugx.org/console-helpers/phpunit-compat/downloads)](https://packagist.org/packages/console-helpers/phpunit-compat)
[![License](https://poser.pugx.org/console-helpers/phpunit-compat/license)](https://packagist.org/packages/console-helpers/phpunit-compat)

PHPUnit-Compat is a compatibility layer for PHPUnit, that allows creating a test case/test suite classes, that will work across different PHPUnit versions.

### Covered methods:

* `\PHPUnit\Framework\TestCase:onNotSuccessfulTest` via `\ConsoleHelpers\PHPUnitCompat\AbstractTestCase::onNotSuccessfulTestCompat`;
* `PHPUnit\Framework\TestSuite::run` via `\ConsoleHelpers\PHPUnitCompat\AbstractTestSuite::runCompat`;
* `\PHPUnit\Framework\TestSuite::tearDown` via `\ConsoleHelpers\PHPUnitCompat\AbstractTestSuite::tearDownCompat` (till PHPUnit 8.1.6; in PHPUnit 8.2.0 method was removed).

### Covered classes:

* `\PHPUnit\Framework\DataProviderTestSuite` via `\ConsoleHelpers\PHPUnitCompat\Framework\DataProviderTestSuite`;
* `\PHPUnit\Framework\TestResult` via `\ConsoleHelpers\PHPUnitCompat\Framework\TestResult`;
* `\PHPUnit\Framework\Test` via `\ConsoleHelpers\PHPUnitCompat\Framework\Test`;
* `\SebastianBergmann\CodeCoverage\CodeCoverage` via `\ConsoleHelpers\CodeCoverageCompat\CodeCoverage`;
* `\SebastianBergmann\CodeCoverage\Driver\Driver'` via `\ConsoleHelpers\CodeCoverageCompat\Driver\Driver`;
* `\SebastianBergmann\CodeCoverage\Filter` via `\ConsoleHelpers\CodeCoverageCompat\Filter`.

For assertion method compatibility please use https://github.com/Yoast/PHPUnit-Polyfills.

## Installation

* Execute this command to add as a dependency: `php composer.phar require console-helpers/phpunit-compat`.

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) file.

## License

PHPUnit-Compat is released under the BSD-3-Clause License. See the bundled [LICENSE](LICENSE) file for details.
