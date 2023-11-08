<?php

namespace App\Enums;

enum SemesterEnum
{
    const ROLE_ADMINISTRATOR = 1;
    const ROLE_INSTRUCTOR = 2;
    const ROLE_STUDENT = 3;

    public function label() : string
    {
        return static::getLabel($this);
    }


    public static function getLabel($value) : string
    {
        return match($value) {
            self::ROLE_ADMINISTRATOR  => 'Administrator',
            self::ROLE_INSTRUCTOR => 'Instructor',
            self::ROLE_STUDENT => 'Student'
        };
    }
}