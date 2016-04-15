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
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
 */

namespace evidev\moodle\plugins\virtualkeyboard\internal;

/**
 * KeyboardLayoutExtractorTest
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
 */
class KeyboardLayoutExtractorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLayout()
    {
        $expected = array(
            'ar' => 'Arabic',
            'as' => 'Assamese'
        );

        $this->assertEquals(
            $expected,
            DefaultKeyboardLayoutExtractor::create(
                $this->getKeyboardJS()
            )->getLayout()
        );
    }

    /**
     * get the keyboard javascript file
     *
     * @return string
     */
    private function getKeyboardJS()
    {
        return __DIR__.'/keyboard.js';
    }
}
