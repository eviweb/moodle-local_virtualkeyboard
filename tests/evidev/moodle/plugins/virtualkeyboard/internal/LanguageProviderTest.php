<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * This file is part of Moodle - http://moodle.org/
 *
 * Moodle is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Moodle is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
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
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
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
