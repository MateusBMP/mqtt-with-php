<?php declare(strict_types=1);

namespace Arcmond\MqttWithPhp;

use PhpMqtt\Client\MqttClient;

class Subscriber
{
    private string $addr;
    private int $port;

    public function __construct($addr, $port)
    {
        $this->addr = $addr;
        $this->port = $port;
    }

    public function subscribe(string $topic): void
    {
        $mqttClient = new MqttClient($this->addr, $this->port);
        
        $mqttClient->connect();
        $mqttClient->subscribe($topic, function ($topic, $message) {
            printf("Received message: %s\n", $message);
        });
        
        $mqttClient->loop(true);
        $mqttClient->disconnect();
    }
}
