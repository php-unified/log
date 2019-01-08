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

##### Info

This function is meant for logging purely informational messages.

##### Log

This function is meant for logging a message with a severity indication.
The severity indication can be picked from the `LogLevel` interface.

##### debug

This function is meant for logging information aimed at developers.
A message must be supplied with a [stack trace](https://en.wikipedia.org/wiki/Stack_trace).

#### PhpUnified\Log\Common\LogLevel

This interface is serving as an [enumerator](https://en.wikipedia.org/wiki/Enumerated_type) for logging severity.
It supplies three levels of severity.

##### WARNING

A warning is a potential failure in the application.
Normal operation can continue, but the underlying issue can result in additional issues with a greater severity.
The user experience most likely didn't get affected.

##### ERROR

An error is a significant failure in the application.
These types of errors should be prioritized.
Normal operation can continue, but might disrupt again.
The user experience did get affected.

##### FATAL

A fatal(ity) is a complete failure of the application.
Immediate action should be taken.
Normal operation most likely can not be continued without action.
The user experience is completely disrupted.

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
use PhpUnified\Log\Common\LogLevel;

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
        $this->logger->log(LogLevel::WARNING, 'Something non-severe happened.');
    }
}
```

### Optional logger

To create an implementation which can optionally log information, implement the following snippet:

```php
namespace YourOrganization\YourPackage;

use PhpUnified\Log\Common\OptionalLoggingInterface;
use PhpUnified\Log\Common\LoggerInterface;
use PhpUnified\Log\Common\LogLevel;

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
            $this->logger->log(LogLevel::WARNING, 'Something non-severe happened.');
        }
    }
}
```

## Tips

### More, better data

To get the most value out of this implementation it is advised to implement logging in a structured way.
This can be achieved by keeping track of some additional information within the application.
Helpful information to recreate a bug can be:
- Installed version of the application.
- PHP version controlling the execution of the code.
- PHP extensions used during execution.
- Installed packages and their respective versions.
- Context of the user, which can be filled with some questions:
- - Is the code accessed through CLI or via a web request?
- - Where there any parameters set, if so what are they?
- - Which command or request path is used?
- - Did the user have any contextual settings (cookies)?

All of this information can then be transferred to the logs.
A snippet of this would look like:
```php
$this->logger->log(LogLevel::WARNING, 'Something non-severe happened.');
$this->logger->info(
    'This should be investigated in these conditions:',
    [
        'system-version' => '1.0.0',
        'installed-packages' => ['...'],
        '...'
    ]
);
$this->logger->debug('The non-severe bug happened here:', $myBacktrace);
```

With this information set, a potential log could look like:
```
Warning: Something non-severe happened.
This should be investigated in these conditions:
system-version: 1.0.0
installed-packages:
  - name: my-package, version: 2.0.0
  - name: not-my-package, version: 1.2.0
php-version: 7.2.13
request-context: web
request-type: POST
request-body: etc..
The non-severe bug happened here:
    1) /var/my-project/pub/index.php(15): Web->__construct()
    2) /var/my-project/app/Bootstrap.php(36): Bootstrap->run()
```

## MIT License

Copyright (c) 2019 Jyxon

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
