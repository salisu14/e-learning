<?php

namespace App\Enums;


enum CourseStatusEnum: string
{
    case ACTIVE   = 'active';
    case INACTIVE = 'inactive';

    public function label() : string
    {
        return static::getLabel($this);
    }


    public static function getLabel($value) : string 
    {
        return match($value) {
            self::ACTIVE   => 'Active',
            self::INACTIVE => 'Inactive'
        };
    }
}