<?php
declare(strict_types=1);

namespace App;

use App\Logger\Logger;

class App
{
    // Это наш вечно-живущий объект
    private static ?self $instance = null;

    // Это наш логгер
    private Logger $logger;


    // Закрываем публичный доступ к конструктору, это противопоказано для синглтона
    protected function __construct()
    {
        $this->logger = new Logger();
    }


    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }



    // Закрываем возможность клонирования
    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Нам точно не нужно десериализовать синглтон!!!");
    }
}
