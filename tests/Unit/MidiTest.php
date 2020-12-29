<?php

namespace MidiConverter\Tests\Unit;

use MidiConverter\Midi;
use MidiConverter\Tests\TestCase;

class MidiTest extends TestCase
{
    public function testItConvertsAMidiFileToAnXmlFile(): void
    {
        $midi = new Midi();
        $midi->importMid($this->getFixturePath('daughter_of_the_sea.midi'));

        $this->assertEquals($this->getFixtureContents('daughter_of_the_sea.xml'), trim($midi->getXml(1)));
    }

    public function testItConvertsAMidiFileToATxtFile(): void
    {
        $midi = new Midi();
        $midi->importMid($this->getFixturePath('daughter_of_the_sea.midi'));

        $this->assertEquals($this->getFixtureContents('daughter_of_the_sea.txt'), trim($midi->getTxt(1)));
    }
}
