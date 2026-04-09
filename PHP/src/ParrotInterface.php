<?php
declare(strict_types=1);

namespace Parrot;
interface ParrotInterface{
    public function getSpeed():float;

    public function getCry():string;
}