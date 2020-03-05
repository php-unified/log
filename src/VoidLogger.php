<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log;

use PhpUnified\Log\Common\LoggerInterface;

/**
 * An implementation of a logger which does not log.
 */
class VoidLogger implements LoggerInterface
{
    /**
     * Purely informational message logging.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $state   Information about the state of the application.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function info(string $message, array $state = []): void
    {
        return;
    }

    /**
     * Logs a message by a defined severity.
     *
     * @param string $level   The severity of the log.
     * @param string $message The message that needs to be logged.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function log(string $level, string $message): void
    {
        return;
    }

    /**
     * Logs debug information aimed at developers.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $trace   The backtrace of what needs to be debugged.
     *
     * @return void
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function debug(string $message, array $trace = []): void
    {
        return;
    }
}
