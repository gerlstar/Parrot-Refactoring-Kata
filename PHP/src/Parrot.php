<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class Parrot
{
 
    private ParrotInterface $parrot;

    // if we add a new Parrot type like TropicalParrot, we can add it in the
    // factory and call the factory inside this constructor so that we dont over
    //populate the constructor
    // eg: $this->parrot = ParrotFactory::create($type, $numberOfCoconuts, $voltage, $isNailed);
    public function __construct(
        private int $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
       $this->parrot = match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($voltage, $isNailed),
            default => throw new Exception('Should be unreachable'),
        };
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return $this->parrot->getSpeed();
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return $this->parrot->getCry();

    }

  
}
