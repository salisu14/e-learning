<?php

namespace App\Enums;


enum LevelEnum: string
{
    case ONE_HUNDRED    = 'one';
    case TWO_HUNDRED    = 'two';
    case THREE_HUNDRED  = 'three';
    case FOUR_HUNDRED   = 'four';

    public function label() : string
    {
        return static::getLabel($this);
    }


    public static function getLabel($value) : string 
    {
        return match($value) {
            self::ONE_HUNDRED     => 'Hundred',
            self::TWO_HUNDRED     => 'Two Hundred',
            self::THREE_HUNDRED   => 'Three Hundred',
            self::FOUR_HUNDRED    => 'Four Hundred'
        };
    }
}