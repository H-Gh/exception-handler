<?php

/**
 * This interface define a method for description of exception
 * php version >= 7.0
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */

namespace HGh\Handlers\Exception\Interfaces;

/**
 * Interface WithDescription
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
interface WithDescription
{
    /**
     * This method will provide a description to exception to show in response
     *
     * @return string
     */
    public function description();
}
