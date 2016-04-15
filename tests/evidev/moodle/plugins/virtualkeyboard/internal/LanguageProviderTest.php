<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * The MIT License
 *
 * Copyright 2016 Eric VILLARD <dev@eviweb.fr>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

namespace evidev\moodle\plugins\virtualkeyboard\internal;

use evidev\moodle\plugins\virtualkeyboard\LanguageProvider;
use Mockery as m;
use Mockery\MockInterface;
use PHPUnit_Framework_TestCase;

/**
 * moodle global get_config function mock
 *
 * @param string $plugin    full component name
 * @param string $name      config setting name
 * @return string
 */
function get_config($plugin, $name)
{
    return LanguageProviderTest::getFunctionMock()->get_config($plugin, $name);
}

/**
 * moodle global current_language function mock
 *
 * @return string
 */
function current_language()
{
    return LanguageProviderTest::getFunctionMock()->current_language();
}

/**
 * LanguageProviderTest
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */
class LanguageProviderTest extends PHPUnit_Framework_TestCase
{
    private static $functionMock;

    /**
     * @return MockInterface
     */
    final public static function getFunctionMock()
    {
        return self::$functionMock;
    }

    /**
     * @inherited
     */
    public function setUp()
    {
        parent::setUp();

        self::$functionMock = m::mock();
    }

    /**
     * @inherited
     */
    public function tearDown()
    {
        parent::tearDown();

        m::close();
    }

    public function testGetLangWhenContextLayoutIsDisabled()
    {
        $expected = 'fr';

        self::getFunctionMock()
            ->shouldReceive('get_config')
            ->once()
            ->with('local_virtualkeyboard', 'layout')
            ->andReturn($expected);

        self::getFunctionMock()
            ->shouldReceive('get_config')
            ->once()
            ->with('local_virtualkeyboard', 'contextlayout')
            ->andReturn('0');

        self::getFunctionMock()
            ->shouldNotReceive('current_language');

        $this->assertLanguage($expected);
    }

    public function testGetLangWhenContextLayoutIsEnabled()
    {
        $expected = 'en';

        self::getFunctionMock()
            ->shouldNotReceive('get_config')
            ->with('local_virtualkeyboard', 'layout');

        self::getFunctionMock()
            ->shouldReceive('get_config')
            ->once()
            ->with('local_virtualkeyboard', 'contextlayout')
            ->andReturn('1');

        self::getFunctionMock()
            ->shouldReceive('current_language')
            ->once()
            ->andReturn($expected);

        $this->assertLanguage($expected);
    }

    /**
     * assert the language code is as the expected one
     *
     * @param string $expected expected language code
     */
    private function assertLanguage($expected)
    {
        $this->assertEquals($expected, DefaultLanguageProvider::create()->getLang());
    }
}
