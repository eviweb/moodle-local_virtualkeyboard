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
 * @package     evidev\moodle\plugins\virtualkeyboard
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

namespace evidev\moodle\plugins\virtualkeyboard;

use evidev\moodle\plugins\virtualkeyboard\internal\DefaultKeyboardLayoutExtractor;
use evidev\moodle\plugins\virtualkeyboard\internal\DefaultLanguageProvider;

/**
 * VirtualKeyboardMainFactory
 *
 * @package     evidev\moodle\plugins\virtualkeyboard
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */
final class VirtualKeyboardMainFactory
{
    /**
     * constructor
     */
    private function __construct()
    {
    }

    /**
     * get a new keyboard layout extractor instance
     *
     * @param  string                  $layoutFile keyboard layout file to be treated
     * @return KeyboardLayoutExtractor
     */
    public static function newKeyboardLayoutExtractor($layoutFile)
    {
        return DefaultKeyboardLayoutExtractor::create($layoutFile);
    }

    /**
     * get a new language provider instance
     *
     * @return LanguageProvider
     */
    public static function newLanguageProvider()
    {
        return DefaultLanguageProvider::create();
    }
}
