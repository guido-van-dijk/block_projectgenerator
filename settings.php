<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) { // Show only to site admins.
    $settings->add(new admin_setting_configtext(
        'block_projectgenerator/openai_api_key',
        get_string('openaiapikey', 'block_projectgenerator'),
        get_string('openaiapikey_desc', 'block_projectgenerator'),
        '',
        PARAM_RAW // Use PARAM_RAW for API keys (allows special chars).
    ));
}