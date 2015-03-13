<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * The MIT License
 *
 * Copyright 2015 Eric VILLARD <dev@eviweb.fr>.
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
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

namespace evidev\moodle\plugins\virtualkeyboard\internal;

use evidev\moodle\plugins\virtualkeyboard\KeyboardLayoutExtractor;

/**
 * DefaultKeyboardLayoutExtractor
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */
final class DefaultKeyboardLayoutExtractor implements KeyboardLayoutExtractor
{
    /**
     * keyboard javascript file
     *
     * @var string
     */
    private $file;

    /**
     * constructor
     *
     * @param string $file keyboard javascript file
     */
    private function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * static creator method
     *
     * @param  string                         $file keyboard javascript file
     * @return DefaultKeyboardLayoutExtractor
     */
    public static function create($file)
    {
        return new static($file);
    }

    /**
     * @inheritdoc
     */
    public function getLayout()
    {
        return $this->parse(file_get_contents($this->file));
    }

    /**
     * parse the keyboard javascript code to extract the layouts
     *
     * @param  string $js javascript code to parse
     * @return array  returns the keyboard layouts
     */
    private function parse($js)
    {
        $matches = array();
        $layouts = array();

        if (preg_match_all($this->getVKILayoutsPattern(), $js, $matches)) {
            foreach ($matches[1] as $layout) {
                $json = json_decode($this->fixString($layout));

                if (isset($json->lang)) {
                    $layouts[] = array(
                        'name' => $json->name,
                        'lang' => $json->lang[0]
                    );
                }
            }
        }

        return $layouts;
    }

    /**
     * get the pattern to extract the keyboard layout definitions
     *
     * @return string
     */
    private function getVKILayoutsPattern()
    {
        return '/this\.VKI_layout\[[^\]]+\]\s*=\s*(\{([^\}]|(?<=[\'\"])\}[\'\"])+\});/';
    }

    /**
     * fix the extracted string to be JSON compliant
     *
     * @param  string $string the string to treat
     * @return string return the modified string
     */
    private function fixString($string)
    {
        $fixes = array(
            array(
                'pattern' => '/\'/',
                'replacement' => '"'
            ),
            array(
                'pattern' => '/"\\\\"(?!")/',
                'replacement' => '"\\\\\\\\\\\\\\\\"'
            ),
            array(
                'pattern' => '/"""/',
                'replacement' => '"'.addslashes('"').'"'
            ),
            array(
                'pattern' => "/'''/",
                'replacement' => "'".addslashes("'")."'"
            ),
        );

        foreach ($fixes as $fix) {
            $string = preg_replace($fix['pattern'], $fix['replacement'], $string);
        }

        return $string;
    }
}
