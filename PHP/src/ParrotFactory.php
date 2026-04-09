<?php
declare(strict_types=1);

namespace Parrot;

class ParrotFactory {
    public static function create(
        int $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): ParrotInterface {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($voltage, $isNailed),
            ParrotTypeEnum::TROPICAL => new TropicalParrot(...),
            default => throw new Exception('Should be unreachable'),
        };
    }
}