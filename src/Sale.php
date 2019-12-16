<?php

namespace Inspetor;

trait Sale
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function createSale(array $data)
    {
        return $this->client->sendRequest('post', 'sale', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function updateSale(array $data)
    {
        return $this->client->sendRequest('put', 'sale', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function deleteSale(array $data)
    {
        return $this->client->sendRequest('delete', 'sale', $data);
    }
}
