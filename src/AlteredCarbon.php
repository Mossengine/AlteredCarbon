<?php namespace Mossengine\AlteredCarbon;

use Carbon\Carbon;
use DateTime;
use InvalidArgumentException;

/**
 * Class Carbonite
 * @package Mossengine\Carbonite
 */
class AlteredCarbon extends Carbon {
    /**
     * Constant for the NotSO8601 DateTime Format
     */
    const NotSO8601 = 'YmdHis:e';

    /**
     * Constant for the NotSO8601 regex pattern
     */
    const NotSO8601Regex = '/^(\d{4})([0][0-9]|[1][0-2])([0-2][0-9]|[3][0-1])([0-1][0-9]|[2][0-3])([0-5][0-9])([0-5][0-9]):([A-z](.*))\/([A-z](.*))$/';

    /**
     * Carbonite constructor.
     * @param null $time
     * @param null $tz
     */
    public function __construct($time = null, $tz = null)
    {
        // Check if $time matches the NotSO8601 format
        if (1 === preg_match(static::NotSO8601Regex, $time)) {
            $alteredCarbon = self::createFromNotSO8601($time);
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
    public static function createFromNotSO8601($stringDateTimeAndOrZone)
    {
        $dt = parent::createFromFormat(static::NotSO8601, $stringDateTimeAndOrZone);

        if ($dt instanceof DateTime) {
            return static::instance($dt);
        }

        throw new InvalidArgumentException(implode(PHP_EOL, parent::getLastErrors()));
    }

    /**
     * Format the instance as RFC822
     *
     * @return string
     */
    public function toNotSO8601String()
    {
        return $this->format(static::NotSO8601);
    }
}