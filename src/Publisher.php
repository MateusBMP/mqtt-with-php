<?php declare(strict_types=1);

namespace Arcmond\MqttWithPhp;

use PhpMqtt\Client\MqttClient;

class Publisher
{
    private string $addr;
    private int $port;

    public function __construct($addr, $port)
    {
        $this->addr = $addr;
        $this->port = $port;
    }

    public function sendMessage(string $topic, string $message): void
    {
        $mqttClient = new MqttClient($this->addr, $this->port);

        $mqttClient->connect();
        $mqttClient->publish($topic, $message);
        $mqttClient->disconnect();
    }
}