<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 2 ) . '/wp-load.php';

$smtp_user = get_theme_mod( 'sam_smtp_user', '' );
$smtp_pass = get_theme_mod( 'sam_smtp_pass', '' );
$recipient = get_theme_mod( 'sam_hiring_form_recipient', '' );

echo "SMTP user set: " . ( $smtp_user ? 'yes (' . $smtp_user . ')' : 'no' ) . PHP_EOL;
echo "SMTP pass set: " . ( $smtp_pass ? 'yes (len ' . strlen( $smtp_pass ) . ')' : 'no' ) . PHP_EOL;
echo "Recipient: " . ( $recipient ? $recipient : '(default: ' . sam_get_form_recipient() . ')' ) . PHP_EOL;
echo "Mail configured: " . ( sam_is_mail_configured() ? 'yes' : 'no' ) . PHP_EOL;
