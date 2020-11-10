# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 2.0.0 - 2020-11-10
### Added
- Additional log levels.

### Removed
- Removed different methods for logging.
- Support for PHP 7.2.

### Refactor
- Implemented PSR12 CS.

## 1.0.3 - 2020-03-05
### Changed
- Changed company name references.

## 1.0.2 - 2019-02-21
### Added
- CHANGELOG.md
- CONTRIBUTING.md
- phpcs.xml
- `squizlabs/php_codesniffer` package to dev requirements.

### Changed
- Archive exclusion rules in `composer.json`.
- `.travis.yml` added composer cache and added PHPCS test.
- `README.md` added Contributing and Change log additions.

### Fixed
- Typo's in `README.md`

## 1.0.1 - 2019-01-15
### Added
- CODE_OF_CONDUCT
- PULL_REQUEST_TEMPLATE

### Changed
- Old name idea from `composer.json`

## 1.0.0 - 2019-01-10
### Added
- `PhpUnified\Log\Common\LoggerInterface` has been created as an interface to standardize loggers
- `PhpUnified\Log\Common\OptionalLoggingInterface` has been created as an interface to indicate an implementation optionally implementing logging.
- `PhpUnified\Log\Common\TransitLoggerInterface` has been created as an interface to standardize multi location loggers.
- `PhpUnified\Log\TransitLogger` has been created as a basic implementation of the `TransitLoggerInterface`.
- `PhpUnified\Log\VoidLogger` has been created as a `LoggerInterface` implementation which doesn't actually log anything.

## Releases
- [2.0.0 > Unreleased](https://github.com/php-unified/log/compare/2.0.0...HEAD)
- [1.0.3 > 2.0.0](https://github.com/php-unified/log/compare/1.0.3...2.0.0)
- [1.0.2 > 1.0.3](https://github.com/php-unified/log/compare/1.0.2...1.0.3)
- [1.0.1 > 1.0.2](https://github.com/php-unified/log/compare/1.0.1...1.0.2)
- [1.0.0 > 1.0.1](https://github.com/php-unified/log/compare/1.0.0...1.0.1)
