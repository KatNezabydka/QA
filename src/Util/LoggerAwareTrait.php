<?php declare(strict_types=1);

namespace App\Util;

use Psr\Log\LoggerInterface;

trait LoggerAwareTrait
{
    /**
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * @required
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function emergency($message, array $context = []): void
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function alert($message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function critical($message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function error($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function notice($message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function info($message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    /**
     * @param string $message
     * @param array  $context
     */
    public function debug($message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    /**
     * @param int    $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = []): void
    {
        $this->logger->log($level, $message, $context);
    }
}
