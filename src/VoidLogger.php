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
        return;
    }
}
