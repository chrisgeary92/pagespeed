# PageSpeed Insights

Gain webpage performance insights with Google PageSpeed Insights.

[![Build Status](https://travis-ci.org/crgeary/pagespeed.svg?branch=master)](https://travis-ci.org/crgeary/pagespeed)

* * *

## Usage

See the [PageSpeed API reference](https://developers.google.com/speed/docs/insights/v2/reference/pagespeedapi/runpagespeed) for a list of optional parameters.

````php
$pagespeed = new \Crgeary\Pagespeed\Service();

$data = $pagespeed->runPagespeed('https://github.com/crgeary/pagespeed', [
    'key' => 'your-pagespeed-api-key',
    'screenshot' => true
]);
````

You can then access properties from the response as shown below:

````php
echo $data->responseCode;
````

## Security

If you discover any security issues, please email dev@crgeary.com.

## License

The MIT [License](LICENSE.md) (MIT).