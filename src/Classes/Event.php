<?php


namespace App\Classes;


class Event
{
    /**
     * @var string
     */
    protected $message;

    /**
     * Event constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getFormattedMessage(): string
    {
        $currentTime = date('Y.m.d H:i');
        return "[$currentTime] $this->message";
    }
}