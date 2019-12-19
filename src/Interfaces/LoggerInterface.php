<?php


namespace App\Interfaces;

use App\Classes\Event;

interface LoggerInterface
{
    /**
     * Log event via log driver.
     *
     * @param Event $event
     */
    public function log(Event $event): void;
}