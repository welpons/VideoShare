<?php

namespace App\Infrastructure\Service\Source;


use App\Domain\Model\Video\Video;
use App\Domain\Model\Video\VideoCollection;
use App\Infrastructure\Service\Transfer\TransferInterface;

class GlorfSource implements SourceInterface
{
    /**
     * @var string
     */
    private $dirFeedExports;

    /**
     * @var array
     */
    private $rawData = [];

    /**
     * @var VideoCollection
     */
    private $videoCollection;

    /**
     * @var bool
     */
    private $isImportFailed = false;

    public function __construct(TransferInterface $transfer)
    {
        //@TODO used to inject the infrastructure to request the videos: ftp, http, etc.

        $this->dirFeedExports;
        $this->videoCollection = new VideoCollection();
    }

    /**
     * @return VideoCollection
     */
    public function getCollectionToImport(): VideoCollection
    {
        $this->getRawSourceData();

        foreach ($this->rawData->videos as $videoPayload) {

            //@TODO Perform different validations

            //@TODO If validation fails register in a log file


            //@TODO Include a Uuid generator
            $id = rand(1, 1000);
            $video = Video::createByUrl($id, $videoPayload->url);
            $video->setName($videoPayload->title);
            $video->setTags($videoPayload->tags);
            $this->videoCollection->add($video);
        }

        return $this->videoCollection;
    }

    private function getRawSourceData()
    {
        //@TODO check whether there is new file or not and if it's in json format

        $file = __DIR__ . '/../../../../feed-exports/glorf.json';

        $fileContent = file_get_contents($file);

        $decodedSource = json_decode($fileContent);

        $this->rawData = $decodedSource;
    }

    public function isImportFailed(): bool
    {
        return $this->isImportFailed;
    }
}