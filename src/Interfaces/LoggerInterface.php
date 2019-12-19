<?php


namespace App\Interfaces;

use App\Classes\Event;

interface LoggerInterface
{
    /**
     * Log event to log file.
     *
     * @param Event $event
     */
    public function log(Event $event): void;
}