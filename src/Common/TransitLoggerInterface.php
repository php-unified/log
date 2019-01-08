<?php

namespace PhpUnified\Log\Common;

/**
 * An interface for loggers which should function as a transit to other loggers.
 */
interface TransitLoggerInterface extends LoggerInterface
{
    /**
     * Adds a logger which needs to recieve incoming logs.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function addLogger(LoggerInterface $logger): void;
}
