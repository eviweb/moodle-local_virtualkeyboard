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

use evidev\moodle\plugins\virtualkeyboard\KeyboardLayoutExtractor;

/**
 * DefaultKeyboardLayoutExtractor
 *
 * @package     evidev\moodle\plugins\virtualkeyboard\internal
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
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
                    $layouts[$json->lang[0]] = $json->name;
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
