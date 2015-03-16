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
 * @package     local_virtualkeyboard
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright   (c) 2015 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

defined('MOODLE_INTERNAL') || die;

require_once __DIR__.'/src/autoload.php';

use evidev\moodle\plugins\virtualkeyboard\internal\DefaultKeyboardLayoutExtractor;

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_virtualkeyboard', get_string('pluginname', 'local_virtualkeyboard'));

    $enable = new admin_setting_configcheckbox(
        'local_virtualkeyboard/enable',
        get_string('setting_enable', 'local_virtualkeyboard'),
        get_string('setting_description_enable', 'local_virtualkeyboard'),
        true
    );
    $settings->add($enable);

    $layout = new admin_setting_configselect(
        'local_virtualkeyboard/layout',
        get_string('setting_layout', 'local_virtualkeyboard'),
        get_string('setting_description_layout', 'local_virtualkeyboard'),
        'en',
        DefaultKeyboardLayoutExtractor::create(
            __DIR__.'/resources/js/keyboard.js'
        )->getLayout()
    );
    $settings->add($layout);

    $ADMIN->add('localplugins', $settings);
}
