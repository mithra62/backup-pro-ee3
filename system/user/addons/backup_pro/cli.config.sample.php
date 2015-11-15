<?php
/**
 * mithra62 - Backup Pro
 *
 * @copyright	Copyright (c) 2015, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./cli.config.sample.php
 */

//set your system path
$settings = array(
    'site_url' => '',
    'site_name' => '',
    'timezone' => '',
    'encryption_key' => '',
    'db' => array(
        'user' => '',
        'password' => '',
        'database' => '',
        'host' => '',
        'prefix' => '',
    ),
    'email' => array(
        'from_email' => '',
        'sender_name' => '',
        'type' => 'smtp', //choose between `php` and `smtp`
        'smtp_options' => array( //if `smtp` chosen above, this must be completed and accurate
            'host' => '',
            'connection_config' => array(
                'username' => '',
                'password' => '',
            ),
            'port' => '',
        )
    )
);