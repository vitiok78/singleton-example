<?php
declare(strict_types=1);

use App\Api\DummyApi;

// Подключаем ядро
require dirname(__DIR__).'/src/kernel.php';


if (true) {
    $api = new DummyApi();
    $api->sendToPutinAndFSB("Стук-стук на Павла Широкова!");
}
