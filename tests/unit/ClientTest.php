<?php

namespace Inspetor\Client;

use Inspetor\Client;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

class ClientTest extends TestCase
{
    public function testSuccessfulResponse()
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(200, []),
        ]);
        $handler = HandlerStack::create($mock);
        $handler->push($history);

        $client = new Client('apiKey', ['handler' => $handler]);
        $response = $client->sendRequest('post', 'account');
        $this->assertTrue($response->isSuccess());
        $this->assertNull($response->getError());

        $this->assertEquals(
            'Bearer apiKey',
            $container[0]['request']->getHeaders()['Authorization'][0]
        );
    }
}
