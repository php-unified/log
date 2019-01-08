<?php

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
    private $loggers;

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
     * Purely informational message logging.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $state   Information about the state of the application.
     *
     * @return void
     */
    public function info(string $message, array $state = []): void
    {
        foreach ($this->loggers as $logger) {
            $logger->info($message, $state);
        }
    }

    /**
     * Logs a message by a defined severity.
     *
     * @param string $level   The severity of the log.
     * @param string $message The message that needs to be logged.
     *
     * @return void
     */
    public function log(string $level, string $message): void
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message);
        }
    }

    /**
     * Logs debug information aimed at developers.
     *
     * @param string $message The message that needs to be logged.
     * @param array  $trace   The backtrace of what needs to be debugged.
     *
     * @return void
     */
    public function debug(string $message, array $trace = []): void
    {
        foreach ($this->loggers as $logger) {
            $logger->debug($message, $trace);
        }
    }
}
