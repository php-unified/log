<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log;

use PhpUnified\Log\Common\TransitLoggerInterface;
use PhpUnified\Log\Common\LoggerInterface;

/**
 * A simple implementation of a transit logger.
 */
class TransitLogger implements TransitLoggerInterface
{
    /**
     * Contains loggers which recieve a broadcast.
     *
     * @var LoggerInterface[]
     */
    private array $loggers;

    /**
     * Adds a logger which needs to recieve incoming logs.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function addLogger(LoggerInterface $logger): void
    {
        $this->loggers[] = $logger;
    }

    /**
     * Logs a message by a defined severity.
     *
     * @param string $level   The severity of the log.
     * @param string $message The message that needs to be logged.
     * @param array  $context Additional context for the log.
     */
    public function log(
        string $level,
        string $message,
        array $context = []
    ): void {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message, $context);
        }
    }
}
