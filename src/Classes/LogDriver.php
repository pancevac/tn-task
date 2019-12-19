<?php


namespace App\Classes;

use App\Interfaces\LoggerInterface;

class LogDriver implements LoggerInterface
{
    /**
     * Log event to log file.
     *
     * @param Event $event
     */
    public function log(Event $event): void
    {
        if (file_exists(__DIR__ . '/../../logs/')) {
            file_put_contents(
                __DIR__ . '/../../logs/log',
                PHP_EOL . $event->getFormattedMessage(),
                FILE_APPEND
            );
        } else {
            mkdir(__DIR__ . '/../../logs', 0775);
            file_put_contents(
                __DIR__ . '/../../logs/log',
                PHP_EOL . $event->getFormattedMessage(),
                FILE_APPEND
            );
        }
    }
}