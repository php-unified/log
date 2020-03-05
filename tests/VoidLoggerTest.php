<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log\Tests;

use PhpUnified\Log\Common\LoggerInterface;
use PhpUnified\Log\VoidLogger;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \PhpUnified\Log\VoidLogger
 */
class VoidLoggerTest extends TestCase
{
    /**
     * Covers the entire VoidLogger class.
     *
     * @return void
     *
     * @covers ::info
     * @covers ::log
     * @covers ::debug
     */
    public function testLogger(): void
    {
        $subject = new VoidLogger();

        $this->assertInstanceOf(VoidLogger::class, $subject);

        $subject->info('Info log');
        $subject->log(LoggerInterface::FATAL, 'Log log');
        $subject->debug('Info log', debug_backtrace());
    }
}
