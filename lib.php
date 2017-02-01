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

defined('MOODLE_INTERNAL') || die;

require_once __DIR__.'/src/autoload.php';

use evidev\moodle\plugins\virtualkeyboard\VirtualKeyboardMainFactory;

function local_virtualkeyboard_resources_hook() {
    global $PAGE;

    if (get_config('local_virtualkeyboard', 'enable')
        && $PAGE->pagetype === 'mod-quiz-attempt') {

        $PAGE->requires->js_init_code(
            file_get_contents(__DIR__.'/resources/js/loader.js')
        );
        $PAGE->requires->js_init_code(
            file_get_contents(__DIR__.'/resources/js/quiz.js')
        );

        $PAGE->requires->js_init_call(
            'enableVirtualKeyboardForQuiz',
            array(VirtualKeyboardMainFactory::newLanguageProvider()->getLang()),
            true
        );
    }
}

function local_virtualkeyboard_extend_navigation()
{
    local_virtualkeyboard_resources_hook();
}

local_virtualkeyboard_extend_navigation();