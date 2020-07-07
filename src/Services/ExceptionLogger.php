<?php

/**
 * This class will log the exceptions
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

use HGh\Handlers\Exception\Interfaces\{Alert, Critical, Debug, Emergency, Error, Info, Notice, NotLog, Warning};
use Throwable;

/**
 * This class will log the exceptions
 * PHP version >= 7.0
 *
 * @category Services
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
class ExceptionLogger
{
    /**
     * The threw exception
     *
     * @var WriterInterface $writer
     */
    private $writer;

    /**
     * ExceptionLogger constructor.
     *
     * @param WriterInterface $writer
     */
    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    /**
     * This method will log the exception
     *
     * @param Throwable $throwable
     *
     * @return void
     */
    public function log(Throwable $throwable)
    {
        if ($this->writer instanceof NotLog) {
            return;
        }
        $this->logException($throwable);
    }

    /**
     * This method will log the current exception
     *
     * @param Throwable $throwable The throwable to log
     */
    private function logException(Throwable $throwable)
    {
        if ($this->writer instanceof Emergency) {
            $this->writer->write($this->getLogMessage($throwable, "Emergency"));
        } elseif ($this->writer instanceof Alert) {
            $this->writer->write($this->getLogMessage($throwable, "Alert"));
        } elseif ($this->writer instanceof Critical) {
            $this->writer->write($this->getLogMessage($throwable, "Critical"));
        } elseif ($this->writer instanceof Error) {
            $this->writer->write($this->getLogMessage($throwable, "Error"));
        } elseif ($this->writer instanceof Warning) {
            $this->writer->write($this->getLogMessage($throwable, "Warning"));
        } elseif ($this->writer instanceof Notice) {
            $this->writer->write($this->getLogMessage($throwable, "Notice"));
        } elseif ($this->writer instanceof Info) {
            $this->writer->write($this->getLogMessage($throwable, "Info"));
        } elseif ($this->writer instanceof Debug) {
            $this->writer->write($this->getLogMessage($throwable, "Debug"));
        } else {
            $this->writer->write($this->getLogMessage($throwable, "Error"));
        }
    }

    /**
     * This method will provide a message for logging from current exception
     *
     * @param Throwable $throwable The throwable to log
     * @param string    $type
     *
     * @return string
     */
    private function getLogMessage(Throwable $throwable, string $type)
    {
        $logMessage = "[" . date("Y-m-d H:i:s") . "] " . $type . ": " . $throwable->getMessage();
        $logMessage .= " in " . $throwable->getFile() . ":" . $throwable->getLine();
        if (method_exists($throwable, "getMetas")) {
            $logMessage .= " Meta: " . json_encode($throwable->getMetas());
        }
        $logMessage .= " Stack trace: " . $throwable->getTraceAsString();
        return $logMessage;
    }
}
