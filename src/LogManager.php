<?php


namespace App;


use App\Classes\Event;
use App\Interfaces\LoggerInterface;

class LogManager
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @var LoggerInterface
     */
    protected $driver;

    /**
     * Prevent class initialization from outside.
     */
    private function __construct()
    {
        //
    }

    /**
     * Get singleton LogManager instance.
     *
     * @return static
     */
    public static function getInstance(): self
    {
        if (is_null(static::$instance)) {
            self::$instance = new LogManager();
        }

        return self::$instance;
    }

    /**
     * @param LoggerInterface $driver
     */
    public function setDriver(LoggerInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Log event via log driver.
     *
     * @param Event $event
     */
    public function writeLog(Event $event): void
    {
        if (is_null($this->driver)) {
            throw new \Exception('LogDriver not specified after ' . self::class . ' initialization.');
        }

        $this->driver->log($event);
    }
}