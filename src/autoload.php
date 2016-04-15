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
 * @package     local_virtualkeyboard
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3
 */

if (!function_exists('local_virtualkeyboard_autoload')) {
    function local_virtualkeyboard_autoload($class)
    {
        $file = __DIR__.DIRECTORY_SEPARATOR.
            str_replace('\\', DIRECTORY_SEPARATOR, $class).
            '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        return false;
    }

    if (!in_array('local_virtualkeyboard_autoload', spl_autoload_functions())) {
        spl_autoload_register('local_virtualkeyboard_autoload');
    }
}