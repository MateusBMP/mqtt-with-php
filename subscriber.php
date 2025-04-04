<?php declare(strict_types=1);

require_once './vendor/autoload.php';

use Arcmond\MqttWithPhp\Subscriber;

$subscriber = new Subscriber('broker', 1883);
$topic = '/test/topic';

$subscriber->subscribe($topic);
