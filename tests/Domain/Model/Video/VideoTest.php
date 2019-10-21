<?php

namespace Tests\Domain\Model\Video;

use PHPUnit\Framework\TestCase;
use App\Domain\Model\Video\Video;

class VideoTest extends TestCase
{
    public function testCreateVideoByUrl()
    {
        $video = Video::createByUrl(1, 'Test Name');

        $this->assertInstanceOf(Video::class, $video);
    }
}