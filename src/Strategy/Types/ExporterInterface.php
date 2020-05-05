<?php declare(strict_types=1);

namespace App\Strategy\Types;

interface ExporterInterface
{
    public function getType(): string;

    /**
     * @throws \Throwable
     */
    public function export(): void;
}
