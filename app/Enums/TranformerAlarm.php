<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TranformerAlarm extends Enum
{
   const BAY_TEMP_ALARM = 1;
   const TRANFORMER_TEMP_ALARM = 2;
   const OVER_CURRENT_ALARM = 3;
   const OVER_VOLTAGE_ALARM = 4;
   const UNDER_CURRENT_ALARM = 5;
   const UNDER_VOLTAGE_ALARM = 5;
   const OIL_TEMP_ALARM = 6;
   const OIL_LEVEL_ALARM = 7;
   const OIL_GAS_CONCENTRATION_ALARM = 8;

   public static function getDescription($value): string
    {
        if ($value === self::BAY_TEMP_ALARM) {
            return 'Bay Temp Alarm';
        }

        if ($value === self::OVER_CURRENT_ALARM) {
            return 'Over Current Alarm';
        }

        if ($value === self::OVER_VOLTAGE_ALARM) {
            return 'Over Voltage Alarm';
        }
    
        return parent::getDescription($value);
    }
}