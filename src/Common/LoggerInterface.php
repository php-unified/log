<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log\Common;

/**
 * The interface for an implementation of a logger.
 */
interface LoggerInterface
{
    /**
     * The system has become unuseable.
     */
    public const EMERGENCY = 'emergency';

    /**
     * Complete failure of the application.
     * User experience got disrupted.
     */
    public const FATAL = 'fatal';

    /**
     * Significant failure in the application.
     * User experience did get affected.
     */
    public const ERROR = 'error';

    /**
     * Potential failure in the application.
     * User experience did not get affected.
     */
    public const WARNING = 'warning';

    /**
     * Minor disruption, can cause adverse effects when left untreated.
     */
    public const NOTICE = 'notice';

    /**
     * Purely informational message logging.
     */
    public const INFO = 'info';

    /**
     * Logs debug information aimed at developers.
     */
    public const DEBUG = 'debug';

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
    ): void;
}
