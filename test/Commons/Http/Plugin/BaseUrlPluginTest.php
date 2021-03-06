<?php

/**
 * =============================================================================
 * @file       Commons/Http/Plugin/BaseUrlPluginTest.php
 * @author     Lukasz Cepowski <lukasz@cepowski.com>
 * 
 * @copyright  PHP Commons
 *             Copyright (C) 2009-2013 PHP Commons Contributors
 *             All rights reserved.
 *             www.phpcommons.com
 * =============================================================================
 */

namespace Commons\Http\Plugin;

class BaseUrlPluginTest extends \PHPUnit_Framework_TestCase
{
    
    public function testInvokeHttp()
    {
        $_SERVER = array(
            'HTTP_HOST' => 'example.com',
            'SCRIPT_NAME' => '/some/app/index.php'
        );
        $plugin = new BaseUrlPlugin();
        $this->assertEquals('http://example.com/some/app', $plugin->baseUrl());
    }
    
    public function testInvokeHttps()
    {
        $_SERVER = array(
            'HTTP_HOST' => 'example.com',
            'SCRIPT_NAME' => '/some/app/index.php',
            'HTTPS' => 'on'
        );
        $plugin = new BaseUrlPlugin();
        $this->assertEquals('https://example.com/some/app', $plugin->baseUrl());
    }
    
}
