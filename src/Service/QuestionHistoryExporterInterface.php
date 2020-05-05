<?php declare(strict_types=1);

namespace App\Service;

use App\Entity\QuestionHistoric;
use Generator;

interface QuestionHistoryExporterInterface
{
    /**
     * @return Generator|QuestionHistoric|null
     */
    public function iterate(): ?Generator;
}
