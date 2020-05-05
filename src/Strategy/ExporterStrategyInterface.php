<?php declare(strict_types=1);

namespace App\Strategy;

use App\Strategy\Types\ExporterInterface;

interface ExporterStrategyInterface
{
    /**
     * @param string $type
     *
     * @return ExporterInterface
     */
    public function get(string $type): ExporterInterface;
}
