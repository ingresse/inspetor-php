<?php

namespace Inspetor\Client;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Inspetor\Client;
use Inspetor\ApiException;
use Inspetor\UnauthorizedException;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @covers Inspetor\Client
     */
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

    /**
     * @covers Inspetor\Client
     */
    public function testInvalidToken()
    {
        $this->expectException(UnauthorizedException::class);

        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(403),
        ]);
        $handler = HandlerStack::create($mock);
        $handler->push($history);

        $client = new Client('invalidKey', ['handler' => $handler]);
        $response = $client->sendRequest('post', 'account');

        $this->assertFalse($response->isSuccess());
        $this->assertTrue($response->getError());
    }

    /**
     * @covers Inspetor\Client
     */
    public function testBadRequest()
    {
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(400),
        ]);
        $handler = HandlerStack::create($mock);
        $handler->push($history);

        $client = new Client('apiKey', ['handler' => $handler]);
        $response = $client->sendRequest('post', 'account');

        $this->assertFalse($response->isSuccess());
        $this->assertNull($response->getError());
    }

    /**
     * @covers Inspetor\Client
     */
    public function testError()
    {
        $this->expectException(ApiException::class);
        $container = [];
        $history = Middleware::history($container);
        $mock = new MockHandler([
            new Response(401),
        ]);
        $handler = HandlerStack::create($mock);
        $handler->push($history);

        $client = new Client('apiKey', ['handler' => $handler]);
        $response = $client->sendRequest('post', 'account');

        $this->assertFalse($response->isSuccess());
        $this->assertTrue($response->getError());
    }
}
