<?php
namespace app\interfaces;

interface CoordinatesInterface
{
    public function doStep(DirectionInterface $direction): void;

    public function isInside(CoordinatesInterface $start, CoordinatesInterface $top): bool;

    public function toString(): string;
}