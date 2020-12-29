<?php

namespace MidiConverter\Tests;

use PHPUnit\Framework\TestCase as PhpUnitTestCase;

class TestCase extends PhpUnitTestCase
{
    protected function getFixturePath(string $file): string
    {
        return __DIR__ . '/fixtures/' . $file;
    }

    protected function getFixtureContents(string $file): string
    {
        return trim(file_get_contents($this->getFixturePath($file)));
    }
}
