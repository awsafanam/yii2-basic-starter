<?php

namespace app\helpers;

class PHelper
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const STATUS_BANNED = 3;
    
    const ACCESS_FREE = 1;
    const ACCESS_PREMIUM = 2;
    
    const NO = 0;
    const YES = 1;

    public static function statusOption($op = null) 
    {
        if($op === null) {
            return [
                self::STATUS_DELETED => 'Deleted', 
                self::STATUS_ACTIVE => 'Active',
                self::STATUS_INACTIVE => 'Inactive',
                self::STATUS_BANNED => 'Banned'
            ];
        } else {
            if($op === self::STATUS_ACTIVE) {
                return 'Active';
            } elseif($op === self::STATUS_INACTIVE) {
                return 'Inactive';
            } elseif($op === self::STATUS_BANNED) {
                return 'Banned';
            } else {
                return 'Deleted';
            }
        }
    }
    public static function accessOption($op = null) 
    {
        if($op === null) {
            return [
                self::ACCESS_FREE => 'Free',
                self::ACCESS_PREMIUM => 'Premium',
            ];
        } else {
            if($op === self::ACCESS_FREE) {
                return 'Free';
            } elseif($op === self::ACCESS_PREMIUM) {
                return 'Premium';
            }
        }
    }
    public static function yesno($op = null) 
    {
        if($op === null) {
            return [self::NO => 'No', self::YES => 'Yes'];
        } else {
            if($op === 1) {
                return 'Yes';
            } else {
                return 'No';
            }
        }
    }
}
