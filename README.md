# Exception Handler  
This package centralizes exceptions behaviour of projects. The duty of this package is to prevent to show unwanted exceptions to user. Actually sometimes you want  some exceptions to be shown in output too. This package will handle both sides.
All exceptions can use the predefined interfaces.   

# Table of contents
 - [Installation](#installation)
 - [Interfaces](#interfaces)
 - [How to use](#how-to-use)
   - [Exception handling](#exception-handling)
   - [Exception logging](#exception-logging)

# Installation
To install this package, require it via the composer.  
``` 
composer require hgh/exception-handler    
``` 

# Interfaces  
There are 11 interfaces that exceptions can be implemented. The exceptions that are implemented from these interfaces will be log in the files by their type.
  
|Interface|Description|  
|---|---|  
|AlertInterface|Mark exception as an alert exception|  
|CriticalInterface|Mark exception as a critical exception|  
|DebugInterface|Mark exception as a debug exception|  
|EmergencyInterface|Mark exception as a emergency exception|  
|InfoInterface|Mark exception as a info exception|  
|NoticeInterface|Mark exception as a notice exception|  
|WarningInterface|Mark exception as a warning exception|  
|NotLog|The exception will not be log|  
|ShouldPublish|The exception will publish in response handler, otherwise will replace with `UnexpectedException`|  
|WithDescription|The exception has extra description addition to exception message|  
  
# How to use  
## Exception handling
First as a sample we define an exception class.  
```php  
/**  
* Class SampleException  
*/  
class SampleException extends BaseException implements ShouldPublish, ErrorInterface {  
}  
$exception = new SampleException("SampleException");  
```  
You can use exception handler directly.   
```php  
$exceptionHandler = new ExceptionHandler($exception);  
$exception = $exceptionHandler->handle(); // The result will be SampleException class
```  
Or use facade:  
```php  
\HGh\Handlers\Exception\Facades\Exception::handle($exception); // The result will be SampleException class
```  
As you can see, the result of exception handling is the same exception, because it implements from `ShouldPublish` interface. 
  
Let's define another exception to see another type of exception handling:  
```php  
/**  
* Class AnotherSampleException  
*/  
class AnotherSampleException extends BaseException implements WarningInterface {  
}  
$exception = new AnotherSampleException("AnotherSampleException");  
$exception = \HGh\Handlers\Exception\Facades\Exception::handle($exception); // The result will UnexpectedException  
```  
See, the result of exception handling is not the same. It is `UnexpectedException` because it doesn't implement the `ShouldPublish` interface.   
  
## Exception Logging
Another class exists here to log the exceptions. First before `ExceptionHandler` change the type of exception, log the exception, then handle it by `ExceptionHanlder`.  
Let's define an exception.  
```php  
/**  
* Class SampleException  
*/  
class SampleException extends BaseException implements ShouldPublish, ErrorInterface {  
}  
$exception = new SampleException("SampleException");
```  
  
Now it's the turn of the logger. You can use the direct service as below:  
```php
$filePath = "/tmp/logs";  
$exceptionLogger = new \HGh\Handlers\Exception\Services\ExceptionLogger($filePath);  
$exceptionLogger->log($exception);  
``` 
or use the facade:  
```php  
\HGh\Handlers\Exception\Facades\Exception::log($exception, $filePath);  
```  
then handle it and pass it to output.
Basically it's better to extend the facade of package and define your own fileWriter to prevent defining the fileWriter each time.
```php
/**  
 * This class is a facade to all exception actions 
 * PHP version >= 7.0
 * 
 * @category Facades  
 * @package ExceptionHandler  
 * @author Hamed Ghasempour <hamedghasempour@gmail.com>  
 * @license MIT https://opensource.org/licenses/MIT  
 * @link null  
 */
 class Exception extends ExceptionFacade  
{  
    /**
     * This method will log an exception
     *
     * @param Throwable $throwable The throwable
     * @param string    $filePath  The file path that throwable should be log into
     *
     * @return void
     */
    public static function log(Throwable $throwable, string $filePath = null)
    {
        if (empty($filePath)) {
            $filePath = "/tmp/logs";
        }
        parent::log($throwable, $filePath);
    }
}
```
By this way, before changing the exception by exception handler, you log every exception, and you will never miss them and on the other side, after handling the exceptions, you will never show to the user unwanted exceptions.