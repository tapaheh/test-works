<?php
namespace app\interfaces;

interface DirectionInterface
{
    public function toRight(): void ;
    public function toLeft(): void ;

    public function getXShift(): int;
    public function getYShift(): int;

    public function toString(): string;
}
