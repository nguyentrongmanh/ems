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
    const USER = 0;
    const ADMIN = 1;
    const SUPPER_ADMIN = 2;
}