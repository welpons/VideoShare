<?php

namespace App\Application\Import\service;

use App\Application\Import\Validation\ValidatorInterface;
use App\Domain\Model\Provider\ProviderRepositoryInterface;
use App\Domain\Model\Video\VideoRepositoryInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Domain\Model\Video\Video;

class ImporterService
{
    /**
     * @var SourceFactory
     */
    private $sourceFactory;

    /**
     * @var VideoRepositoryInterface
     */
    private $videoRepository;

    /**
     * @var ProviderRepositoryInterface
     */
    private $providerRepository;

    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var ValidatorInterface
     */
    private $providerValidator;

    public function __construct(
        SourceFactory $sourceFactory,
        VideoRepositoryInterface $videoRepository,
        ProviderRepositoryInterface $providerRepository,
        ValidatorInterface $providerValidator,
        ?OutputInterface $output = null)
    {
        $this->sourceFactory = $sourceFactory;
        $this->videoRepository = $videoRepository;
        $this->providerRepository = $providerRepository;
        $this->providerValidator = $providerValidator;
        $this->output = $output;
    }

    public function import(string $providerName)
    {
        // Validations first
        $provider = $this->providerValidator->validateByName($providerName);

        if (!$provider) {
            throw new \InvalidArgumentException(sprintf('Unknown provider name: %s ', $providerName));
        }

        $source = $this->sourceFactory->getSource($providerName);

        try {
            $videosToImport = $source->getCollectionToImport();
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }

        foreach($videosToImport as $i => $video) {
            $this->importVideo($video);
        }

        if ($source->isImportFailed()) {
            // @TODO other actions to inform about the status of the process
            $this->output->writeln(' >>>> Some imports failed. Please check log file');
        }

    }

    private function importVideo(Video $video) : void
    {
        // @TODO additional tasks
        $this->videoRepository->add($video);
        $this->output->writeln(sprintf('Importing: "%s"; Url: %s; Tags: %s', $video->getName(), $video->getUrl(), implode(', ', $video->getTags())));
    }
}