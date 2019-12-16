<?php

namespace Inspetor;

use Inspetor\Client;
use GuzzleHttp\Psr7\Request;

class Inspetor
{
    use Account;
    use Auth;
    use Event;
    use Sale;
    use Transfer;

    /**
     * @var Client
     */
    private $client;

    /**
     * @param GuzzleHttp\Client $guzzleClient
     */
    public function __construct(Client $client = null)
    {
        $this->client = $client ?? new Client();
    }
}
