<?php

/**
 * This interface is an interface that introduce the methods to write data in a file
 * PHP version >= 7.0
 *
 * @category Services
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @version  GIT: <git_id>
 * @link     null
 */

namespace HGh\Handlers\Exception\Services;

/**
 * This interface is an interface that introduce the methods to write data in a file
 * PHP version >= 7.0
 *
 * @category Services
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
interface WriterInterface
{
    /**
     * This method will write data to a file
     *
     * @param string $text The text to write in file
     *
     * @return false|int
     */
    public function write(string $text);
}
