<?php

/**
 * Class CarboniteTest
 */
class CarboniteTest extends PHPUnit_Framework_TestCase{
    /**
     * Just check if the Carbonite class has no syntax error
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     *
     */
    public function testIsThereAnySyntaxError() {
        $carbonite = new Mossengine\AlteredCarbon\AlteredCarbon;
        $this->assertTrue($carbonite instanceof Mossengine\AlteredCarbon\AlteredCarbon);
        unset($carbonite);
    }

    /**
     * This tests the constructor for AlteredCarbon to detect the correct format and return back as NotSO8601 format to be the same as the original
     */
    public function testConstructionOfNotSO8601() {
        echo PHP_EOL . 'Test Contraction of NotSO8601' . PHP_EOL;

        $stringNotSO8601 = '20180215135543:Australia/Brisbane';

        echo '$alteredCarbon = new AlteredCarbon(' . $stringNotSO8601 . ');' . PHP_EOL;
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringNotSO8601);

        echo '$alteredCarbon->toDateTimeString() . \' : \' . $alteredCarbon->getTimezone()->getName(); -> ' . $alteredCarbon->toDateTimeString() . ' : ' . $alteredCarbon->getTimezone()->getName() . PHP_EOL;

        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        echo '$alteredCarbon->toNotSO8601String(); -> ' . $alteredCarbon->toNotSO8601String() . PHP_EOL;

        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the constructor for AlteredCarbon to not detect any other format and allow Carbon to continue handling the format type
     */
    public function testConstructionOfAnyOtherFormat() {
        echo PHP_EOL . 'Test Contraction of any other format' . PHP_EOL;

        $stringDateTime = '2018-02-15 13:55:43';

        echo '$alteredCarbon = new AlteredCarbon(' . $stringDateTime . ');' . PHP_EOL;
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringDateTime);

        echo '$alteredCarbon->toDateTimeString() . \' : \' . $alteredCarbon->getTimezone()->getName(); -> ' . $alteredCarbon->toDateTimeString() . ' : ' . $alteredCarbon->getTimezone()->getName() . PHP_EOL;

        $this->assertSame($stringDateTime, $alteredCarbon->toDateTimeString());
        echo '$alteredCarbon->toDateTimeString(); -> ' . $alteredCarbon->toDateTimeString() . PHP_EOL;

        $this->assertSame('UTC', $alteredCarbon->getTimezone()->getName());
        echo '$alteredCarbon->getTimezone()->getName(); -> ' . $alteredCarbon->getTimezone()->getName() . PHP_EOL;

        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromNotSO8601AndtoNotSO8601String() {
        echo PHP_EOL . 'Test Create From NotSO8601 format' . PHP_EOL;

        $stringNotSO8601 = '20180215135543:Australia/Brisbane';

        echo '$alteredCarbon = AlteredCarbon::createFromNotSO8601(' . $stringNotSO8601 . ');' . PHP_EOL;
        $alteredCarbon = Mossengine\AlteredCarbon\AlteredCarbon::createFromNotSO8601($stringNotSO8601);

        echo '$alteredCarbon->toDateTimeString() . \' : \' . $alteredCarbon->getTimezone()->getName(); -> ' . $alteredCarbon->toDateTimeString() . ' : ' . $alteredCarbon->getTimezone()->getName() . PHP_EOL;

        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        echo '$alteredCarbon->toNotSO8601String(); -> ' . $alteredCarbon->toNotSO8601String() . PHP_EOL;

        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromAnyDateTimeAndtoNotSO8601String() {
        echo PHP_EOL . 'Test Create From NotSO8601 format' . PHP_EOL;

        $stringNotSO8601 = '20180215135543:Australia/Brisbane';

        $stringDateTime = '2018-02-15 13:55:43';
        $stringTimezone = 'Australia/Brisbane';

        echo '$alteredCarbon = new AlteredCarbon(' . $stringDateTime . ', ' . $stringTimezone . ');' . PHP_EOL;
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringDateTime, $stringTimezone);

        echo '$alteredCarbon->toDateTimeString() . \' : \' . $alteredCarbon->getTimezone()->getName(); -> ' . $alteredCarbon->toDateTimeString() . ' : ' . $alteredCarbon->getTimezone()->getName() . PHP_EOL;

        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        echo '$alteredCarbon->toNotSO8601String(); -> ' . $alteredCarbon->toNotSO8601String() . PHP_EOL;

        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromNotSO8601AndtoNotSO8601StringWithInvalidFormat() {
        echo PHP_EOL . 'Test Create From NotSO8601 with invalid format' . PHP_EOL;

        $stringDateTime = '2018-02-15 13:55:43';

        echo '$alteredCarbon = AlteredCarbon::createFromNotSO8601(' . $stringDateTime . ');' . PHP_EOL;

        try {
            $alteredCarbon = Mossengine\AlteredCarbon\AlteredCarbon::createFromNotSO8601($stringDateTime);
            $boolResults = true;
        } catch (\Exception $e) {
            $boolResults = false;
        }

        $this->assertNotTrue($boolResults);

        unset($carbonite);
        unset($stringNotSO8601);
    }
}