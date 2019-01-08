<?php

namespace PhpUnified\Log\Common;

/**
 * An interface to supply different levels of logging.
 */
interface LogLevel
{
    /**
     * Potential failure in the application.
     * User experience did not get affected.
     *
     * @var string
     */
    const WARNING = 'warning';

    /**
     * Significant failure in the application.
     * User experience did get affected.
     *
     * @var string
     */
    const ERROR = 'error';

    /**
     * Complete failure of the application.
     * User experience got disrupted.
     *
     * @var string
     */
    const FATAL = 'fatal';
}
