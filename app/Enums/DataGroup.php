<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DataGroup extends Enum
{
    const SUBSTATION = 1;
    const TRANFORMER = 2;
    const BUSBAR = 3;
    const BAY = 4;
    const INSTRUMENT = 5;
}