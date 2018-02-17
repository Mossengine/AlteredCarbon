<?php namespace Mossengine\AlteredCarbon;

use Carbon\Carbon;
use DateTime;

/**
 * Class Carbonite
 * @package Mossengine\Carbonite
 */
class AlteredCarbon extends Carbon {
    /**
     * Constant for the AltSO8601 DateTime Format
     */
    const AltSO8601 = 'YmdHis:e';

    /**
     * Constant for the AltSO8601 regex pattern
     */
    const AltSO8601Regex = '/^(\d{4})([0][0-9]|[1][0-2])([0-2][0-9]|[3][0-1])([0-1][0-9]|[2][0-3])([0-5][0-9])([0-5][0-9]):([A-z](.*))\/([A-z](.*))$/';

    /**
     * AlteredCarbon constructor.
     * @param null $time
     * @param null $tz
     */
    public function __construct($time = null, $tz = null)
    {
        // Check if $time matches the AltSO8601 format
        if (1 === preg_match(static::AltSO8601Regex, $time)) {
            $alteredCarbon = self::createFromAltSO8601($time);
            $time = $alteredCarbon->toDateTimeString();
            $tz = $alteredCarbon->getTimezone()->getName();
        }

        // Continue to construct the parent with the $time and $tz
        parent::__construct($time, $tz);
    }

    /**
     * @param $stringDateTimeAndOrZone
     * @return static
     */
    public static function createFromAltSO8601($stringDateTimeAndOrZone)
    {
        $dt = parent::createFromFormat(static::AltSO8601, $stringDateTimeAndOrZone);

        if ($dt instanceof DateTime) {
            return static::instance($dt);
        }
    }

    /**
     * @return string
     */
    public function toAltSO8601String()
    {
        return $this->format(static::AltSO8601);
    }
}