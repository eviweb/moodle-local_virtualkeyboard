<?php

use evidev\moodle\plugins\virtualkeyboard\VirtualKeyboardMainFactory;

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
        VirtualKeyboardMainFactory::newKeyboardLayoutExtractor(
            __DIR__.'/resources/js/keyboard.js'
        )->getLayout()
    );
    $settings->add($layout);

    $contextlayout = new admin_setting_configcheckbox(
        'local_virtualkeyboard/contextlayout',
        get_string('setting_contextlayout', 'local_virtualkeyboard'),
        get_string('setting_description_contextlayout', 'local_virtualkeyboard'),
        false
    );
    $settings->add($contextlayout);

    $ADMIN->add('localplugins', $settings);
}
