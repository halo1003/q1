<?php
namespace Tests;
require './src/URL.php';
use PHPUnit\Framework\TestCase;
use App\URL;

class URLTest extends TestCase
{
    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
}