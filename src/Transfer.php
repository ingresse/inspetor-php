<?php

namespace Inspetor;

trait Transfer
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function createTransfer(array $data) {
        return $this->client->sendRequest('post', 'transfer', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function updateTransfer(array $data) {
        return $this->client->sendRequest('put', 'transfer', $data);
    }
}
