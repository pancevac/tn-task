<?php

namespace App\Classes;

class TollStation
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * Total charged price
     *
     * @var int
     */
    protected $totalCharged = 0;

    /**
     * Get singleton TollStation instance.
     *
     * @return self
     */
    public static function getInstance(): self
    {
        if (is_null(static::$instance)) {
            self::$instance = new TollStation();
        }

        return self::$instance;
    }

    /**
     * @return int
     */
    public function getTotalCharged(): int
    {
        return $this->totalCharged;
    }

    /**
     * Add charged price to station's total sum;
     *
     * @param int $price
     */
    public function addCharged(int $price): void
    {
        $this->totalCharged += $price;
    }

    private function __construct()
    {
    }

    final public function __clone()
    {
        throw new \Exception('Cannot clone this class.');
    }

    final public function __wakeup()
    {
        throw new \Exception('Cannot wake up this class.');
    }
}