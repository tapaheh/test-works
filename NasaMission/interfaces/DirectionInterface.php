<?php
namespace app\interfaces;

interface DirectionInterface
{
    public function toRight();
    public function toLeft();

    public function getXShift(): int;
    public function getYShift(): int;

    public function toString(): string;
}
