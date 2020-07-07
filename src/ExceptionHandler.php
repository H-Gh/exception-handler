<?php

/**
 * This class will handle the unwanted exceptions
 * php version >= 7.0
 *
 * @category Providers
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 * php version 7.4
 */

namespace HGh\Handlers\Exception;

use HGh\Handlers\Exception\Exceptions\UnexpectedException;
use HGh\Handlers\Exception\Interfaces\ShouldPublish;
use Throwable;

/**
 * Class ResponseProvider
 *
 * @category Providers
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
class ExceptionHandler implements HandlerInterface
{
    /**
     * The threw exception
     *
     * @var Throwable $throwable
     */
    private $throwable;

    /**
     * ExceptionHandler constructor.
     *
     * @param Throwable $throwable The threw exception
     */
    public function __construct(Throwable $throwable)
    {
        $this->throwable = $throwable;
    }

    /**
     * This method handle the throwable
     *
     * @return Throwable
     */
    public function handle()
    {
        if ($this->throwable instanceof ShouldPublish) {
            return $this->throwable;
        } else {
            return new UnexpectedException();
        }
    }
}
