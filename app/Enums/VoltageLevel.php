<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VoltageLevel extends Enum
{
    const HIGHT_VOLTAGE_110KV = 1;
    const HIGHT_VOLTAGE_35KV = 2;
    const HIGHT_VOLTAGE_22KV = 3;
}