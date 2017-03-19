<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * SwiftMailer driver, used with the email helper.
 *
 * @see http://www.swiftmailer.org/wikidocs/v3/connections/nativemail
 * @see http://www.swiftmailer.org/wikidocs/v3/connections/sendmail
 * @see http://www.swiftmailer.org/wikidocs/v3/connections/smtp
 *
 * Valid drivers are: native, sendmail, smtp
 */
$config['driver'] = 'smtp';

/**
 * To use secure connections with SMTP, set "port" to 465 instead of 25.
 * To enable TLS, set "encryption" to "tls".
 *
 * Driver options:
 * @param   null    native: no options
 * @param   string  sendmail: executable path, with -bs or equivalent attached
 * @param   array   smtp: hostname, (username), (password), (port), (auth), (encryption)
 */
$config['options'] = [
    'hostname' => 'smtp.mailtrap.io',
    'username' => '452938a81f43ffc76',
    'password' => '7a98377241c01f',
    'port' => '2525'
];


$config['max_imap_messages'] = 10;