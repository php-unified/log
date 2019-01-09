<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log\Tests;

use PhpUnified\Log\Common\LoggerInterface;
use PhpUnified\Log\TransitLogger;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \PhpUnified\Log\TransitLogger
 */
class TransitLoggerTest extends TestCase
{
    /**
     * Covers the entire TransitLogger class.
     *
     * @return void
     *
     * @covers ::info
     * @covers ::log
     * @covers ::debug
     * @covers ::addLogger
     */
    public function testLogger(): void
    {
        $loggerMock = $this->createMock(LoggerInterface::class);

        $loggerMock->expects(self::once())
            ->method('info')
            ->with('Info log');

        $loggerMock->expects(self::once())
            ->method('log')
            ->with(LoggerInterface::FATAL, 'Log log');

        $loggerMock->expects(self::once())
            ->method('debug')
            ->with('Info log', $this->isType('array'));

        $subject = new TransitLogger();

        $this->assertInstanceOf(TransitLogger::class, $subject);

        $subject->addLogger($loggerMock);
        $subject->info('Info log');
        $subject->log(LoggerInterface::FATAL ,'Log log');
        $subject->debug('Info log', debug_backtrace());
    }
}
