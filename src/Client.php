<?php

namespace Inspetor;

use GuzzleHttp;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var string
     */
    protected $endpoint = 'https://collection-prod.inspcdn.net/';

    /**
     * @var array
     */
    protected $headers = [];

    /**
     * @var string
     */
    protected $token;

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * @param GuzzleHttp\Client $guzzleClient
     */
    public function __construct(Client $guzzleClient = null)
    {
        $this->client = $guzzleClient ?? new Client();
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @param string $endpoint
     */
    public function setEndpoint(string $endpoint): void
    {
        if (substr($endpoint, -1) != '/') {
            $endpoint .= '/';
        }
        $this->endpoint = $endpoint;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array  $query
     * @return array
     */
    public function sendRequest(string $method, string $path, array $body=[]): Response
    {
        $request = new Request(
            $method,
            $this->endpoint.$path,
            $this->getHeaders(),
            !empty($body) ? json_encode($body) : null
        );

        $response = $this->client->send($request);

        return new Response(
            true,
            json_decode($response->getBody()->getContents(), true)['data']
        );
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return array_merge(
            $this->headers,
            $this->getDefaultHeaders()
        );
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = array_merge($this->headers, $headers);
    }

    /**
     * @return array
     */
    private function getDefaultHeaders(): array
    {
        return [
            'Authorization' => sprintf('Bearer %s', $this->token),
            'Content-Type' => 'application/json'
        ];
    }
}