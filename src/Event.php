<?php

namespace Inspetor;

trait Event
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function createEvent(array $data) {
        return $this->client->sendRequest('post', 'event', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function updateEvent(array $data) {
        return $this->client->sendRequest('put', 'event', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function deleteEvent(array $data) {
        return $this->client->sendRequest('delete', 'event', $data);
    }
}
