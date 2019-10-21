<?php

namespace Tests\Infrastructure\Service\Source;


use App\Domain\Model\Video\VideoCollection;
use App\Infrastructure\Service\Source\GlorfSource;
use App\Infrastructure\Service\Transfer\TransferInterface;
use PHPUnit\Framework\TestCase;

class GlorfSourceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testGetCollectionToImport()
    {
        $ocalTransfer = $this->getMock(TransferInterface::class);

        $glorfSource = new GlorfSource($ocalTransfer);

        $collection = $glorfSource->getCollectionToImport();

        $this->assertInstanceOf(VideoCollection::class, $collection);
    }

    // @TODO write some test manipulating the json files and their locations
}