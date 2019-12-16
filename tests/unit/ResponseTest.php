<?php

namespace Inspetor\Response;

use Inspetor\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    /**
     * @covers Inspetor\Response
     */
    public function testSuccess()
    {
        $response = new Response(true, []);

        $this->assertTrue($response->isSuccess());
        $this->assertEmpty($response->getData());
        $this->assertNull($response->getError());
    }

    /**
     * @covers Inspetor\Response
     */
    public function testFailure()
    {
        $response = new Response(false, null, ['error']);

        $this->assertFalse($response->isSuccess());
        $this->assertNull($response->getData());
        $this->assertEquals(['error'], $response->getError());
    }
}