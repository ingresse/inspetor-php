<?php

namespace Inspetor;

trait Auth
{
    /**
     * @param  array  $data
     * @return Response
     */
    public function auth(array $data)
    {
        return $this->client->sendRequest('delete', 'account', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function forgotPassword(array $data)
    {
        return $this->client->sendRequest('post', 'auth', $data);
    }
}
