<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace PhpUnified\Log\Common;

/**
 * The interface for an implementation which has an optional logger.
 * The logger is optional, because it is not required before instantiation.
 */
interface OptionalLoggingInterface
{
    /**
     * Set a logger on the implementation.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void;
}
