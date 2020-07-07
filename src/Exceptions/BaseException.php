<?php

/**
 * This class is the abstract class of all exceptions to force them to have some methods
 * PHP version >= 7.0
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @version  GIT: <git_id>
 * @link     null
 */

namespace HGh\Handlers\Exception\Exceptions;

use BetPress\Helpers\TextHelper;
use Exception;
use Throwable;

/**
 * This class is the abstract class of all exceptions to force them to have some methods
 * PHP version >= 7.0
 *
 * @category Exceptions
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
abstract class BaseException extends Exception
{
    /**
     * The data of exception can be useful
     *
     * @var array $metas
     */
    protected $metas = [];

    /**
     * CasinoException constructor.
     *
     * @param string         $message  The message of Exception
     * @param int            $code     The code of Exception
     * @param Throwable|null $previous The previous throwable used for the exception chaining.
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Add a new Meta
     *
     * @param string $key   The key of Meta
     * @param mixed  $value The value of Meta
     *
     * @return BaseException
     */
    public function addMeta(string $key, $value)
    {
        $this->metas[$key] = $value;
        return $this;
    }

    /**
     * This method will return all the metas
     *
     * @return array
     */
    public function getMetas(): array
    {
        return $this->metas;
    }

    /**
     * This method will return the project defined error codes
     *
     * @return array
     */
    public function errors()
    {
        $className = TextHelper::remove("Exception", TextHelper::className(static::class));
        return [TextHelper::toSnakeCase($className)];
    }
}
