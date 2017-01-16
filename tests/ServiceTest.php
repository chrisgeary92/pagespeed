<?php

namespace Chrisgeary92\Pagespeed\Test;

use Chrisgeary92\Pagespeed\Service;
use Chrisgeary92\Pagespeed\PagespeedException;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_is_initializable()
    {
        $service = new Service();

        $this->assertInstanceOf(Service::class, $service);
    }

    /** @test */
    public function it_can_merge_url_with_optional_query_arguments()
    {
        $service = new Service();

        $return = $service->getArguments('https://google.com', [
            'strategy' => 'desktop',
            'screenshot' => true
        ]);

        $this->assertArrayHasKey('url', $return);
        $this->assertArrayHasKey('strategy', $return);
        $this->assertArrayHasKey('screenshot', $return);
    }

    /** @test */
    public function it_can_successfully_test_a_public_webpage()
    {
        $url = 'https://github.com/chrisgeary92/pagespeed';

        $service = new Service();
        $response = $service->runPagespeed($url);

        $this->assertEquals($url, $response->id);
        $this->assertEquals(200, $response->responseCode);
    }

    /** @test */
    public function it_throws_exceptions_for_failed_pagespeed_checks()
    {
        $this->expectException(PagespeedException::class);

        $service = new Service();
        $response = $service->runPagespeed('test');
    }
}
