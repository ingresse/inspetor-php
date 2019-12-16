<?php

namespace Inspetor;

trait Account
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function createAccount(array $data) {
        return $this->client->sendRequest('post', 'account', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function updateAccount(array $data) {
        return $this->client->sendRequest('put', 'account', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function deleteAccount(array $data) {
        return $this->client->sendRequest('delete', 'account', $data);
    }
}
