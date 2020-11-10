[![Build Status](https://travis-ci.com/php-unified/log.svg?branch=master)](https://travis-ci.com/php-unified/log)

# PHP Unified Log

This package provides a standard for logging in PHP.
The package aims to create a multi-use standard.

Please note that this package only contains interfaces for the implementation and a non-logging implementation.

## Installation

```bash
composer require php-unified/log
```

## Usage

### Provided interfaces

#### PhpUnified\Log\Common\LoggerInterface

This interface provides a standard for implementing loggers into applications.
It exposes three functions.

##### log

This function is meant for logging a message with a severity indication.
The severity indication can be picked from the constants defined in the interface.

##### Constants

The constants in this class can be used to determine the severity of the log.

###### EMERGENCY

The system has become unuseable. Multiple components of the system have stopped
working.

###### FATAL

A fatal(ity) is a complete failure of the application.
Immediate action should be taken.
Normal operation most likely can not be continued without action.
The user experience is completely disrupted.

###### ERROR

An error is a significant failure in the application.
These types of errors should be prioritized.
Normal operation can continue, but might disrupt again.
The user experience did get affected.

###### WARNING

A warning is a potential failure in the application.
Normal operation can continue, but the underlying issue can result in additional issues with a greater severity.
The user experience most likely didn't get affected.

###### NOTICE

A notice is a minor disruption in the application. Normal operation is
possible. However the warning can have adverse affects if left untreated.

###### INFO

These logs are meant to supply information about the system. E.g. which
processes have been run.

###### DEBUG

Logs information meant for developers. E.g. performance statistics.

#### PhpUnified\Log\Common\OptionalLoggingInterface

This interface provides a standard for an implementation which can optionally log information.
This can be useful when less information should be logged in a production environment opposed to development environments.

#### PhpUnified\Log\Common\TransitLoggerInterface

This interface provides a standard for multi-logger.
The implementation of this interface should function a pass-through to several other implementations of the `LoggerInterface`.
This could be useful if logs should be stored in multiple places or in different formats.

For this interface, an implementation is provided. See: `PhpUnified\Log\TransitLogger`.

### Require a logger

To create an implementation which requires a logger, implement the following snippet:

```php
namespace YourOrganization\YourPackage;

use PhpUnified\Log\Common\LoggerInterface;

class YourClass
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * The description of my function.
     *
     * @return void
     */
    public function myFunction(): void
    {
        //some code
        $this->logger->log(LoggerInterface::WARNING, 'Something non-severe happened.');
    }
}
```

### Optional logger

To create an implementation which can optionally log information, implement the following snippet:

```php
namespace YourOrganization\YourPackage;

use PhpUnified\Log\Common\OptionalLoggingInterface;
use PhpUnified\Log\Common\LoggerInterface;

class YourClass implements OptionalLoggingInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Optionally set a logger after instantiation.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * The description of my function.
     *
     * @return void
     */
    public function myFunction(): void
    {
        //some code
        if ($this->logger !== null) {
            $this->logger->log(LoggerInterface::WARNING, 'Something non-severe happened.');
        }
    }
}
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) GrizzIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
