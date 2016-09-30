<?php

namespace ClickSend\Worker;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Queue
{
    private $url;
    private $apiKey;
    private $client;

    public function __construct($url, $apiKey)
    {
        $this->url = rtrim($url, '/');
        $this->apiKey = $apiKey;
        $this->client = new Client(['headers' => ['Authorization' => 'Bearer ' . $this->apiKey]]);
    }

    /**
     * Publish a message.
     *
     * @param Message $message
     * @return \Psr\Http\Message\ResponseInterface
     * @throws ClientException
     */
    public function publish(Message $message)
    {
        $payload = [$message->toArray()];

        return $this->client->post($this->url . '/queues', ['json' => $payload]);
    }

    /**
     * Batch publish.
     *
     * @param array $messages
     * @return \Psr\Http\Message\ResponseInterface|void
     * @throws ClientException
     */
    public function batch($messages = [])
    {
        $payload = [];

        foreach ($messages as $message) {

            if (!$message instanceof Message) return;

            $payload[] = $message->toArray();

        }

        return $this->client->post($this->url . '/queues', ['json' => $payload]);
    }
}

#END OF PHP FILE