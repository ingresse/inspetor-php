<?php

namespace Inspetor;

trait Transfer
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function transferCreate(array $data)
    {
        return $this->client->sendRequest('post', 'transfer', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function transferUpdate(array $data)
    {
        return $this->client->sendRequest('put', 'transfer', $data);
    }
}
