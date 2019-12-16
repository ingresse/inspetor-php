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
        return $this->client->sendRequest('delete', 'auth', $data);
    }

    /**
     * @param  array  $data
     * @return Response
     */
    public function forgotPassword(array $data)
    {
        return $this->client->sendRequest('post', 'forgot-password', $data);
    }
}
