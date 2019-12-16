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
    public function __construct($token, array $extras = [])
    {
        $this->token = $token;

        $this->client = new GuzzleHttp\Client($extras);
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
    public function sendRequest(string $method, string $path, array $body = []): Response
    {
        $request = new Request(
            $method,
            $this->endpoint.$path,
            $this->getHeaders(),
            !empty($body) ? json_encode($body) : null
        );

        return $this->call($request);
    }

    private function call(Request $request)
    {
        try {
            return new Response(
                true,
                json_decode($this->client->send($request)->getBody()->getContents(), true)
            );
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 403) {
                throw new UnauthorizedException;
            }
            if ($e->getResponse()->getStatusCode() != 400) {
                throw new ApiException(
                    sprintf(
                        'Inspetor returned an error code %s. Details: %s',
                        $e->getResponse()->getStatusCode(),
                        $e->getMessage()
                    )
                );
            }
            return new Response(
                false,
                null,
                json_decode($e->getResponse()->getBody()->getContents(), true)
            );
        }
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
    protected function getDefaultHeaders(): array
    {
        return [
            'Authorization' => sprintf('Bearer %s', $this->token),
            'Content-Type' => 'application/json'
        ];
    }
}
