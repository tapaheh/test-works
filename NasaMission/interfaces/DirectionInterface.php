<?php
namespace app\interfaces;

interface DirectionInterface
{
    public function toRight();
    public function toLeft();

    public function getXStep(): int;
    public function getYStep(): int;

    public function toString(): string;
}