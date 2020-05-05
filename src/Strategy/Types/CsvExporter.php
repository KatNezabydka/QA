<?php declare(strict_types=1);

namespace App\Strategy\Types;

use App\Service\QuestionHistoryExporterInterface;
use App\Util\JMSSerializerAwareTrait;

class CsvExporter implements ExporterInterface
{
    use JMSSerializerAwareTrait;

    public const FILE_NAME = 'question-history.csv';

    private QuestionHistoryExporterInterface $questionHistoryExporter;

    public function __construct(QuestionHistoryExporterInterface $questionHistoryExporter)
    {
        $this->questionHistoryExporter = $questionHistoryExporter;
    }

    public function getType(): string
    {
        return 'csv';
    }

    /**
     * @throws \Throwable
     */
    public function export(): void
    {
        $handle = fopen(self::FILE_NAME, 'wb');

        try {
            foreach ($this->questionHistoryExporter->iterate() as $item) {
                fputcsv($handle, $this->toArray($item));
            }
        } catch (\Throwable $exception) {
            throw $exception;
        } finally {
            fclose($handle);
        }
    }
}
