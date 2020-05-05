<?php declare(strict_types=1);

namespace App\Strategy;

use App\Strategy\Types\ExporterInterface;

class ExporterStrategy implements ExporterStrategyInterface
{
    private array $strategies = [];

    public function __construct(iterable $strategies)
    {
        foreach ($strategies as $strategy) {
            $this->strategies[$strategy->getType()] = $strategy;
        }
    }

    public function get(string $type): ExporterInterface
    {
        if (!array_key_exists($type, $this->strategies)) {
            throw new \RuntimeException("Strategy {$type} not found");
        }

        return $this->strategies[$type];
    }
}
