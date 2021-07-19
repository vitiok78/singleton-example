<?php
declare(strict_types=1);

namespace App\Api;

use App\App;

class DummyApi
{
    public function sendToPutinAndFSB(string $message): void
    {
        // Переменная, которую мы хотим отправить в лог
        $anyVarForLogging = [
            'name' => 'Павел Широков',
            'job' => 'Давать нам лишнюю работу'
        ];

        // А вот и наш вызов логгера, вот так просто...
        App::getInstance()->getLogger()->info($message, $anyVarForLogging);
    }
}
