<?php

namespace ClickSend\Worker;

class Message
{
    private $url;
    private $postAsJson;
    private $postData;
    private $retries;
    private $retriesLimit;
    private $delay;
    private $timeout;
    private $priority;

    /**
     * Message constructor.
     *
     * @param $url
     * @param $postData
     * @param $postAsJson
     * @param $delay
     * @param $priority
     * @param $retries
     * @param $timeout
     */
    public function __construct($url, $postData, $postAsJson, $delay, $priority, $retries, $timeout)
    {
        $this->url = $url;
        $this->postData = $postData;
        $this->postAsJson = $postAsJson;
        $this->delay = $delay;
        $this->priority = $priority;
        $this->retries = 0;
        $this->retriesLimit = $retries;
        $this->timeout = $timeout;
    }

    /**
     * Get delay.
     *
     * @return mixed
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * Get post as json.
     *
     * @return mixed
     */
    public function getPostAsJson()
    {
        return $this->postAsJson;
    }

    /**
     * Get post data.
     *
     * @return mixed
     */
    public function getPostData()
    {
        return $this->postData;
    }

    /**
     * Get priority.
     *
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get retries.
     *
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * Get retries limit.
     *
     * @return mixed
     */
    public function getRetriesLimit()
    {
        return $this->retriesLimit;
    }

    /**
     * Get timeout.
     *
     * @return mixed
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Get URL.
     *
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Convert data to array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'meta' => [
                'retries' => $this->retries,
                'retries_limit' => $this->retriesLimit,
                'delay' => $this->delay,
                'timeout' => $this->timeout,
                'priority' => $this->priority
            ],
            'data' => [
                'url' => $this->url,
                'json_post' => $this->postAsJson,
                'post_data' => $this->postData
            ]
        ];
    }
}

#END OF PHP FILE