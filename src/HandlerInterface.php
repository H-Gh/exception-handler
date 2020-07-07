<?php

/**
 * This interface introduce the methods for providers
 * php version >= 7.0
 *
 * @category API
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */

namespace HGh\Handlers\Exception;

/**
 * Interface ProviderInterface
 *
 * @category API
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
interface HandlerInterface
{
    /**
     * This method handle the data
     *
     * @return mixed
     */
    public function handle();
}
