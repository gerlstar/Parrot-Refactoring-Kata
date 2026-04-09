<?php

declare(strict_types=1);

namespace Parrot;
// use ParrotInterface;
use Exception;

class NorwegianBlueParrot extends Parrot  implements ParrotInterface
{
    private const BASESPEED = 12.0;
    private const LOADFACTOR = 9.0;
    private const GAGE = 24.0;
    private string $cry = '...';
    private string $cryWithVoltage = 'Bzzzzzz';

    public function __construct(

        private float $voltage,
        private bool $isNailed
    ) {}

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {

        if (!$this->isNailed) {
            return self::getBaseSpeedWith($this->voltage);
        }
        return 0;
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return $this->voltage > 0 ? $this->cryWithVoltage : $this->cry;
    }

    public function getBaseSpeedWith(float $voltage): float
    {
        return min(self::GAGE, $voltage * $this->getBaseSpeed());
    }

    public function getLoadFactor(): float
    {
        return self::LOADFACTOR;
    }

    public function getBaseSpeed(): float
    {
        return self::BASESPEED;
    }
}
