<?php

/**
 * This exception will throw when an unexpected thing happened
 * php version >= 7.0
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 * php version 7.4
 */

namespace HGh\Handlers\Exception\Exceptions;

use HGh\Handlers\Exception\Interfaces\WithDescription;
use Throwable;

/**
 * Class UnexpectedException
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
class UnexpectedException extends BaseException implements WithDescription
{
    /**
     * UnexpectedException constructor.
     *
     * @param string         $message  The message of Exception
     * @param int            $code     The code of Exception
     * @param Throwable|null $previous he previous throwable used for the exception chaining.
     */
    public function __construct(
        $message = "Unexpected error!",
        $code = 500,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * This method will provide a description to exception to show in response
     *
     * @return string
     */
    public function description()
    {
        return "Something unexpected happened. That's all we know!.";
    }
}
