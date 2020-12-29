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

    public function testItConvertsAnXmlFileToAMidiFile(): void
    {
        $midi = new Midi();
        $midi->importXml($this->getFixtureContents('daughter_of_the_sea.xml'));
        $fileHandler = $this->writeTemporaryFile($midi->getMid());

        $midi = new Midi();
        $midi->importMid($this->getTemporaryFilePath($fileHandler));

        $this->assertEquals($this->getFixtureContents('daughter_of_the_sea.xml'), trim($midi->getXml(1)));
    }

    public function testItConvertsATxtFileToAMidiFile(): void
    {
        $midi = new Midi();
        $midi->importTxt($this->getFixtureContents('daughter_of_the_sea.txt'));
        $fileHandler = $this->writeTemporaryFile($midi->getMid());

        $midi = new Midi();
        $midi->importMid($this->getTemporaryFilePath($fileHandler));

        $this->assertEquals($this->getFixtureContents('daughter_of_the_sea.txt'), trim($midi->getTxt(1)));
    }

    /** @return false|resource */
    private function writeTemporaryFile(string $content)
    {
        $file = tmpfile();
        fwrite($file, $content);
        return $file;
    }

    /** @param false|resource $fileHandler */
    private function getTemporaryFilePath($fileHandler): string
    {
        return stream_get_meta_data($fileHandler)['uri'] ?? '';
    }
}
