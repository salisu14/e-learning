<?php

namespace App\Enums;


enum CourseTypeEnum: string
{
    case CORE   = 'core';
    case ELECTIVE = 'elective';

    public function label() : string
    {
        return static::getLabel($this);
    }


    public static function getLabel($value) : string 
    {
        return match($value) {
            self::CORE     => 'Core',
            self::ELECTIVE => 'Elective'
        };
    }
}