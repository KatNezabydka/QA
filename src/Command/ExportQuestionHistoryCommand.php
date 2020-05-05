<?php declare(strict_types=1);

namespace App\Command;

use App\Strategy\ExporterStrategyInterface;
use App\Util\LoggerAwareTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExportQuestionHistoryCommand extends Command
{
    use LoggerAwareTrait;

    protected static $defaultName = 'app:export:question-history';

    private ExporterStrategyInterface $exporterStrategy;

    public function __construct(ExporterStrategyInterface $exporterStrategy, string $name = null)
    {
        parent::__construct($name);

        $this->exporterStrategy = $exporterStrategy;
    }

    protected function configure()
    {
        $this
            ->setDescription('Export question-history')
            ->addArgument('format', InputArgument::OPTIONAL, 'Argument description', 'csv')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $format = $input->getArgument('format');

        $this->exporterStrategy->get($format)->export();

        $this->info('app:export:question-history success completed');

        return 0;
    }
}
