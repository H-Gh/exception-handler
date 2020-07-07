<?php

/**
 * This class is a facade for exception handler
 * PHP version >= 7.0
 *
 * @category Facades
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @version  GIT: <git_id>
 * @link     null
 */

namespace HGh\Handlers\Exception\Facades;

use HGh\Handlers\Exception\ExceptionHandler;
use HGh\Handlers\Exception\Services\ExceptionLogger;
use HGh\Handlers\Exception\Services\FileWriter;
use Throwable;

/**
 * This class is a facade for exception handler
 * PHP version >= 7.0
 *
 * @category Facades
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
class Exception
{
    /**
     * This method will handle The throwable
     *
     * @param Throwable $throwable The throwable
     *
     * @return Throwable
     */
    public static function handle(Throwable $throwable)
    {
        return (new ExceptionHandler($throwable))->handle();
    }

    /**
     * This method will log an exception
     *
     * @param Throwable $throwable The throwable
     * @param string    $filePath  The file path that throwable should be log into
     *
     * @return void
     */
    public static function log(Throwable $throwable, string $filePath)
    {
        $fileWriter = new FileWriter($filePath);
        (new ExceptionLogger($fileWriter))->log($throwable);
    }
}
