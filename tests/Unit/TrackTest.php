<?php

namespace MidiConverter\Tests\Unit;

use MidiConverter\Tests\TestCase;
use MidiConverter\Track;

class TrackTest extends TestCase
{
    public function testItSetsEventsFromTheConstructor(): void
    {
        $track = new Track(['geralt' => 'of rivia']);

        $this->assertEquals(['geralt' => 'of rivia'], $track->events);
    }

    public function testItChecksEventsForOffsetExistsWithArrayAccessor(): void
    {
        $track = new Track(['geralt' => 'of rivia']);

        $this->assertTrue(isset($track['geralt']));
        $this->assertFalse(isset($track['yennefer']));
    }

    public function testItGetsOffsetFromEventsWithArrayAccessor(): void
    {
        $track = new Track(['geralt' => 'of rivia']);

        $this->assertEquals('of rivia', $track['geralt']);
    }

    public function testItSetsOffsetToEventsWithArrayAccessor(): void
    {
        $track = new Track([]);
        $track['geralt'] = 'of rivia';

        $this->assertEquals('of rivia', $track->events['geralt']);
    }

    public function testItDeletesOffsetFromEventsWithArrayAccessor(): void
    {
        $track = new Track(['geralt' => 'of rivia']);
        unset($track['geralt']);

        $this->assertFalse(array_key_exists('geralt', $track->events));
    }
}
