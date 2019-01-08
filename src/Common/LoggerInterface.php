<?php

namespace PhpUnified\Log\Common;

/**
 * The interface for an implementation of a logger.
 */
interface LoggerInterface
{
    /**
     * Purely informational message logging.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $state   Information about the state of the application.
     */
     public function info(string $message, array $state = []): void;

    /**
     * Logs a message by a defined severity.
     *
     * @param string $level   The severity of the log.
     * @param string $message The message that needs to be logged.
     */
    public function log(string $level, string $message): void;

    /**
     * Logs debug information aimed at developers.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $trace   The backtrace of what needs to be debugged.
     */
    public function debug(string $message, array $trace = []): void;
}
