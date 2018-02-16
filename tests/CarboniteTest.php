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
        $stringNotSO8601 = '20180215135543:Australia/Brisbane';
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringNotSO8601);
        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the constructor for AlteredCarbon to not detect any other format and allow Carbon to continue handling the format type
     */
    public function testConstructionOfAnyOtherFormat() {
        $stringDateTime = '2018-02-15 13:55:43';
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringDateTime);
        $this->assertSame($stringDateTime, $alteredCarbon->toDateTimeString());
        $this->assertSame('UTC', $alteredCarbon->getTimezone()->getName());
        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromNotSO8601AndtoNotSO8601String() {
        $stringNotSO8601 = '20180215135543:Australia/Brisbane';
        $alteredCarbon = Mossengine\AlteredCarbon\AlteredCarbon::createFromNotSO8601($stringNotSO8601);
        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromAnyDateTimeAndtoNotSO8601String() {
        $stringNotSO8601 = '20180215135543:Australia/Brisbane';
        $stringDateTime = '2018-02-15 13:55:43';
        $stringTimezone = 'Australia/Brisbane';
        $alteredCarbon = new Mossengine\AlteredCarbon\AlteredCarbon($stringDateTime, $stringTimezone);
        $this->assertSame($stringNotSO8601, $alteredCarbon->toNotSO8601String());
        unset($carbonite);
        unset($stringNotSO8601);
    }

    /**
     * This tests the createFromNotSO8601 and the toNotSO8601String functions
     */
    public function testCreateFromNotSO8601AndtoNotSO8601StringWithInvalidFormat() {
        $stringDateTime = '2018-02-15 13:55:43';
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