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

/**
 * DefaultLanguageProvider
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2016 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */
final class DefaultLanguageProvider implements LanguageProvider
{

    /**
     * constructor
     */
    private function __construct()
    {

    }

    /**
     * static creator method
     *
     * @return DefaultLanguageProvider
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @inheritdoc
     */
    public function getLang()
    {
        return (boolean) get_config('local_virtualkeyboard', 'contextlayout')
            ? current_language()
            : get_config('local_virtualkeyboard', 'layout');
    }
}