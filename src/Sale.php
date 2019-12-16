<?php

namespace Inspetor;

trait Sale
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function saleCreate(array $data)
    {
        return $this->client->sendRequest('post', 'sale', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function saleUpdate(array $data)
    {
        return $this->client->sendRequest('put', 'sale', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function saleDelete(array $data)
    {
        return $this->client->sendRequest('delete', 'sale', $data);
    }
}
