<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log\Tests;

use PhpUnified\Log\Common\LoggerInterface;
use PhpUnified\Log\NullLogger;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \PhpUnified\Log\NullLogger
 */
class NullLoggerTest extends TestCase
{
    /**
     * Covers the entire NullLogger class.
     *
     * @return void
     *
     * @covers ::info
     * @covers ::log
     * @covers ::debug
     */
    public function testLogger(): void
    {
        $subject = new NullLogger();

        $this->assertInstanceOf(NullLogger::class, $subject);

        $subject->info('Info log');
        $subject->log(LoggerInterface::FATAL ,'Log log');
        $subject->debug('Info log', debug_backtrace());
    }
}
