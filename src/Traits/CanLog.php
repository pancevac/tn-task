<?php


namespace App\Traits;

use App\Classes\Event;
use App\LogManager;

trait CanLog
{
    /**
     * Log event via log manager.
     *
     * @param Event $event
     */
    public function log(Event $event): void
    {
        (LogManager::getInstance())->writeLog($event);
    }
}