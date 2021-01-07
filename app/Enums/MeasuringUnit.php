<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MeasuringUnit extends Enum
{
    const VOLTAGE = 1;
    const AMPERAGE = 2;
    const FREQUENCY = 3;
    public static function getDescription($value): string
    {
        if ($value === self::VOLTAGE) {
            return 'KV';
        }

        if ($value === self::AMPERAGE) {
            return 'A';
        }

        if ($value === self::FREQUENCY) {
            return 'Hz';
        }
    
        return parent::getDescription($value);
    }

}