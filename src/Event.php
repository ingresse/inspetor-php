<?php

namespace Inspetor;

trait Event
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function eventCreate(array $data) {
        return $this->client->sendRequest('post', 'event', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function eventUpdate(array $data) {
        return $this->client->sendRequest('put', 'event', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function eventDelete(array $data) {
        return $this->client->sendRequest('delete', 'event', $data);
    }
}
