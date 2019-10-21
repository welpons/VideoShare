<?php

namespace App\Infrastructure\Service\Source;

use App\Domain\Model\Video\VideoCollection;
use App\Infrastructure\Service\Parser\ParserInterface;
use App\Infrastructure\Service\Transfer\LocalTransfer;
use App\Infrastructure\Service\Transfer\TransferInterface;


class FlubSource implements SourceInterface
{
    public function __construct(TransferInterface $transfer, ParserInterface $parser)
    {
        //@TODO used to inject the appropiate trans
    }

    public function getCollectionToImport(): VideoCollection
    {
        throw new \Exception('Flub source not implemented. Impossible to import the videos');
        // TODO: Implement getCollectionToImport() method.
    }

    public function isImportFailed(): bool
    {
        // TODO: Implement isImportFailed() method.
    }
}