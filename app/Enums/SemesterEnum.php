<?php

namespace App\Enums;


enum SemesterEnum: string
{
    case FIRST_SEMESTER = 'first';
    case SECOND_SEMESTER = 'second';

    public function label() : string
    {
        return static::getLabel($this);
    }


    public static function getLabel($value) : string 
    {
        return match($value) {
            self::FIRST_SEMESTER   => 'First Semester',
            self::SECOND_SEMESTER => 'Second Semester'
        };
    }
}