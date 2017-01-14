# PageSpeed Insights

Gain webpage performance insights with Google PageSpeed Insights.

* * *

## Usage

See the [PageSpeed API reference](https://developers.google.com/speed/docs/insights/v2/reference/pagespeedapi/runpagespeed) for a list of optional parameters.

````
$pagespeed = new \Chrisgeary92\Pagespeed\Service();

$data = $pagespeed->runPagespeed('https://github.com/chrisgeary92/pagespeed', [
    'key' => 'your-pagespeed-api-key',
    'screenshot' => true
]);
````

## Security

If you discover any security issues, please email dev@crgeary.com.

## License

The MIT [License](LICENSE.md) (MIT).