<?php

/**
 * =============================================================================
 * @file       Commons/Callback/CallbackTest.php
 * @author     Lukasz Cepowski <lukasz@cepowski.com>
 * 
 * @copyright  PHP Commons
 *             Copyright (C) 2009-2013 PHP Commons Contributors
 *             All rights reserved.
 *             www.phpcommons.com
 * =============================================================================
 */

namespace Commons\Callback;

function mock_callable_function()
{
    return 'ok';
}

class CallbackTest extends \PHPUnit_Framework_TestCase
{
    
    public $foo = false;

    public function testCallback_MissingArgument()
    {
        $this->setExpectedException('Commons\\Callback\\Exception');
        $callable = new Callback();
    }
    
    public function testCallback_TooMuchArguments()
    {
        $this->setExpectedException('Commons\\Callback\\Exception');
        $callable = new Callback(1, 2, 3);
    }
    
    public function testCallback_InvalidArgument()
    {
        $this->setExpectedException('Commons\\Callback\\Exception');
        $callable = new Callback('NonExistingClass::unknownMethod');
    }
    
    public function testCallback_Function()
    {
        $callable = new Callback('Commons\\Callback\\mock_callable_function');
        $this->assertEquals('Commons\\Callback\\mock_callable_function', $callable->getCallback());
        $this->assertEquals('ok', $callable->call());
    }
    
    public function testCallback_Method()
    {
        $callable = new Callback(new \Mock\Callback\Object(), 'method');
        $this->assertTrue(is_array($callable->getCallback()));
        $this->assertEquals('ok', $callable->call(array('test' => 'ok')));
    }
    
    public function testCallToClosure()
    {
        $this->assertFalse($this->foo);
        $callback = new Callback(function($ctx, $param){ $ctx->foo = $param; });
        $callback->call($this, 123);
        $this->assertEquals(123, $this->foo);
    }    
    
    public function testCallArrayToClosure()
    {
        $this->assertFalse($this->foo);
        $callback = new Callback(function($ctx, $param){ $ctx->foo = $param; });
        $callback->callArray(array($this, 123));
        $this->assertEquals(123, $this->foo);
    }    
    
}
