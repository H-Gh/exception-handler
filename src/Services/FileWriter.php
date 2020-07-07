<?php

/**
 * This class will provide a file to read from and write into it
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
 * This class will provide a file to read from and write into it
 * PHP version >= 7.0
 *
 * @category Services
 * @package  ExceptionHandler
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     null
 */
class FileWriter implements WriterInterface
{
    /**
     * The file pointer
     *
     * @var resource
     */
    private $file;

    /**
     * The mode of opening file
     *
     * @var string
     */
    private $mode = "rw";

    /**
     * FileProvider constructor.
     *
     * @param string $filePath The file path
     */
    public function __construct(string $filePath)
    {
        $this->file = $this->getFilePointer($filePath);
    }

    /**
     * @param string $filePath
     *
     * @return false|resource
     */
    private function getFilePointer(string $filePath)
    {
        $pathInfo = pathinfo($filePath);
        if (!file_exists($pathInfo["dirname"])) {
            mkdir($pathInfo["dirname"]);
        }
        return fopen($filePath, $this->mode);
    }

    /**
     * Set the mode of opening the file
     *
     * @param string $mode The mode of opening the file
     *
     * @return $this
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * This method will write data to a file
     *
     * @param string $text The text to write in file
     *
     * @return false|int
     */
    public function write(string $text)
    {
        return fwrite($this->file, $text);
    }
}
