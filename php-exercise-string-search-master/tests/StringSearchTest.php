<?php
require 'string_search.php';

class StringSearchTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider stringSearchData
     */
    public function test_string_search($needle, $haystack, $expected)
    {
        $this->assertSame($expected, string_search($needle, $haystack));
    }

    public function stringSearchData()
    {
        return [
            ['string', 'Some string.', "Found 'string' at index 5"],
            ['not there', 'Some string.', false],
            ['', 'Some string', false],
            ['not there', '', false],
            ['ab', 'abracadabra', "Found 'ab' at index 0"],
            ['CAPS', 'Not caps.', false],
            ['Code Louisville', 'Searching Code Louisville.', "Found 'Code Louisville' at index 10"]
        ];
    }
}