<?php declare(strict_types=1);

require_once './vendor/autoload.php';

use Arcmond\MqttWithPhp\Publisher;

$publisher = new Publisher('broker', 1883);
$topic = '/test/topic';
$message = 'Hello World!';

while (true) {
    $publisher->sendMessage($topic, $message);
    sleep(1); // Sleep for 1 second before sending the next message
}
