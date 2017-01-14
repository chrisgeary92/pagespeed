<?php

namespace Chrisgeary92\Pagespeed;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Service
{
    /**
     * Base URL for PageSpeed Insights API
     *
     * @var string
     */
    protected $base = 'https://www.googleapis.com/pagespeedonline/v2';

    /**
     * Send a request to PSI
     *
     * @param string $url
     * @param array $arguments
     * @return array
     * @throws PagespeedException
     */ 
    public function runPagespeed($url, array $arguments = [])
    {
        $request = $this->getPagespeedRequest($url, $arguments);
        $client = new Client();

        try {
            $response = $client->send($request);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $message = \GuzzleHttp\Psr7\str($e->getResponse());
            throw new PagespeedException($message);
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * Create a Psr7 compatible request
     *
     * @param string $url
     * @param array $arguments
     * @return GuzzleHttp\Psr7\Request
     */
    public function getPagespeedRequest($url, array $arguments = [])
    {
        $query = $this->httpBuildQuery($this->getArguments($url, $arguments));

        return new Request('GET', "{$this->base}/runPagespeed?{$query}");
    }

    /**
     * Build an HTTP query string to RFC3986
     *
     * @param array $arguments
     * @return string
     */
    protected function httpBuildQuery(array $arguments = [])
    {
        return http_build_query($arguments, null, '&', PHP_QUERY_RFC3986);
    }

    /**
     * Combine arguments into 1 array
     *
     * @param string $url
     * @param array $arguments
     * @return array
     */
    public function getArguments($url, array $arguments = [])
    {
        return array_replace($this->getDefaultArguments(), $arguments, compact('url'));
    }

    /**
     * Get default arguments
     *
     * @return array
     */
    protected function getDefaultArguments()
    {
        return [
            'prettyprint' => false
        ];
    }
}
