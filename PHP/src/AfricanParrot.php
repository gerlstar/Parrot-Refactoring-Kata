<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class AfricanParrot extends Parrot implements ParrotInterface
{
    private const BASESPEED = 12.0;
    private const LOADFACTOR = 9.0;
    private const GAGE = 24.0;

    private string $cry = 'Sqaark!';

    public function __construct(
        /**
         * @var int ParrotTypeEnum
         */
        private int $numberOfCoconuts,

    ) {}

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        $baseSpeed = $this->getBaseSpeed();

        return max(0, $baseSpeed - self::LOADFACTOR * $this->numberOfCoconuts);
    }

    public function getCry(): string
    {
        return $this->cry;
    }


    public function getBaseSpeed(): float
    {
        return self::BASESPEED;
    }
    public function getBaseSpeedWith(float $voltage): float
    {
        return min(self::GAGE, $voltage * $this->getBaseSpeed());
    }

    public function getLoadFactor(): float
    {
        return self::LOADFACTOR;
    }
}
