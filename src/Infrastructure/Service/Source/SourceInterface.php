<?php


namespace App\Infrastructure\Service\Source;


use App\Domain\Model\Video\VideoCollection;

interface SourceInterface
{
    /**
     * @return VideoCollection
     */
    public function getCollectionToImport() : VideoCollection;

    public function isImportFailed() : bool;
}