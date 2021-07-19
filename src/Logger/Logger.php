<?php
declare(strict_types=1);

namespace App\Logger;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    private MonologLogger $logger;

    public function __construct(
        string $channel = 'elastic',
        string $stream = 'php://stdout',
        int $level = MonologLogger::INFO
    ) {
        // Инициализируем, собственно, Monolog
        $this->logger = new MonologLogger($channel);
        $this->logger->pushHandler(
            new StreamHandler($stream,$level)
        );
    }

    // Зачем все эти методы, если можно напрямую вызывать MonologLogger?
    // А мы можем присобачить ещё один логгер,
    // который будет, например, в телеграм отправлять логи

    public function debug($message, $context = []): void
    {
        $this->log(MonologLogger::DEBUG, $message, $context);
    }

    public function info($message, $context = []): void
    {
        $this->log(MonologLogger::INFO, $message, $context);
    }

    public function notice($message, $context = []): void
    {
        $this->log(MonologLogger::NOTICE, $message, $context);
    }

    public function warning($message, $context = []): void
    {
        $this->log(MonologLogger::WARNING, $message, $context);
    }

    public function error($message, $context = []): void
    {
        $this->log(MonologLogger::ERROR, $message, $context);
    }

    public function critical($message, $context = []): void
    {
        $this->log(MonologLogger::CRITICAL, $message, $context);
    }

    public function alert($message, $context = []): void
    {
        $this->log(MonologLogger::ALERT, $message, $context);
    }

    public function emergency($message, $context = []): void
    {
        $this->log(MonologLogger::EMERGENCY, $message, $context);
    }

    /**
     * Основной наш логгер
     * @param int|string $level - Уровень логгирования
     * @param string $message - Сообщение
     * @param $context - Контекст в виде массива
     */
    public function log($level, string $message, $context): void
    {
        $this->logger->log($level, $message, $context);

        /// Здесь можно ещё куда-то логгировать, если понадобится.
        // При этом ни одной строчки в основном коде менять не надо будет
    }
}
