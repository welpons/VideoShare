<?php

namespace App\Application\Import\Command;

use App\Application\Import\service\ImporterService;
use App\Application\Import\service\SourceFactory;
use App\Application\Import\Validation\ProviderValidator;
use App\Infrastructure\Persistence\MySQL\MySQLProviderRepository;
use App\Infrastructure\Persistence\MySQL\MySQLVideoRepository;
use http\Exception\InvalidArgumentException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ImporterCommand extends Command
{
    /**
     * @var ProviderValidator
     */
    private $providerValidator;

    /**
     * @var MySQLProviderRepository
     */
    private $providerRepository;

    /**
     * @var MySQLVideoRepository
     */
    private $videoRepository;

    /**
     * @var SourceFactory
     */
    private $sourceFactory;

    public function __construct()
    {
        parent::__construct();

        // @TODO Convert Command as service and inject dependencies
        $this->providerRepository = new MySQLProviderRepository();
        $this->videoRepository = new MySQLVideoRepository();
        $this->providerValidator = new ProviderValidator($this->providerRepository);
        $this->sourceFactory = new SourceFactory();
    }
    protected function configure()
    {
        $this->setName('import')
            ->setDescription('This command imports colection of videos from different providers')
            ->setHelp('Provider name must unique')
            ->addArgument('provider-name', InputArgument::REQUIRED, 'Pass the provider name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $importerService = new ImporterService(
            $this->sourceFactory,
            $this->videoRepository,
            $this->providerRepository,
            $this->providerValidator,
            $output);

        $output->writeln(' -------------- Import started ------- ');

        $importerService->import($input->getArgument('provider-name'));

        $output->writeln(' -------------- Import finished ------- ');
    }
}