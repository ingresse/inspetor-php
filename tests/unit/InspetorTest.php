<?php

namespace Inspetor\Inspetor;

use Inspetor\Client;
use Inspetor\Inspetor;
use Inspetor\Response;
use PHPUnit\Framework\TestCase;

class InspetorTest extends TestCase
{
    /**
     * @covers Inspetor\Inspetor
     */
    public function testCreateAccount()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'account', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->createAccount($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testUpdateAccount()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('put', 'account', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->updateAccount($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testDeleteAccount()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('delete', 'account', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->deleteAccount($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testAuth()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'auth', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->auth($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testForgotPassword()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'forgot-password', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->forgotPassword($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testCreateEvent()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'event', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->createEvent($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testUpdateEvent()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('put', 'event', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->updateEvent($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testDeleteEvent()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('delete', 'event', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->deleteEvent($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testCreateSale()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'sale', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->createSale($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testUpdateSale()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('put', 'sale', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->updateSale($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testDeleteSale()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('delete', 'sale', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->deleteSale($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testCreateTransfer()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('post', 'transfer', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->createTransfer($data));
    }

    /**
     * @covers Inspetor\Inspetor
     */
    public function testUpdateTransfer()
    {
        $response = $this->createMock('Inspetor\Response');

        $data = [];
        $client = $this->createMock('Inspetor\Client');
        $client
            ->expects($this->once())
            ->method('sendRequest')
            ->with('put', 'transfer', $data)
            ->willReturn($response);

        $inspetor = new Inspetor($client);
        $this->assertEquals($response, $inspetor->updateTransfer($data));
    }
}
