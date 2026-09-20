<?php
define( 'WP_USE_THEMES', false );
require dirname( __DIR__, 2 ) . '/wp-load.php';

$smtp_user = get_theme_mod( 'sam_smtp_user', '' );
$smtp_pass = get_theme_mod( 'sam_smtp_pass', '' );
$recipient = sam_get_form_recipient();

echo "SMTP user set: " . ( $smtp_user ? 'yes (' . $smtp_user . ')' : 'no' ) . PHP_EOL;
echo "SMTP pass set: " . ( $smtp_pass ? 'yes (len ' . strlen( $smtp_pass ) . ')' : 'no' ) . PHP_EOL;
echo "Recipient: " . $recipient . PHP_EOL;
echo "Mail configured: " . ( sam_is_mail_configured() ? 'yes' : 'no' ) . PHP_EOL;
echo "WP Mail SMTP plugin: " . ( defined( 'WPMS_PLUGIN_VER' ) || class_exists( 'WPMailSMTP\Core' ) ? 'yes' : 'no' ) . PHP_EOL;

$GLOBALS['sam_last_mail_error'] = '';
$sent = sam_send_notification_email(
	'SAM Manpower SMTP Test',
	"This is a test email from the SAM Manpower theme mail checker.\nTime: " . gmdate( 'c' ),
	'SAM Test',
	$smtp_user ? $smtp_user : 'test@example.com'
);

echo "Send result: " . ( $sent ? 'SUCCESS' : 'FAILED' ) . PHP_EOL;
if ( ! empty( $GLOBALS['sam_last_mail_error'] ) ) {
	echo "Error: " . $GLOBALS['sam_last_mail_error'] . PHP_EOL;
}
