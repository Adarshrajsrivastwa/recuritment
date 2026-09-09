<?php
/**
 * Template Name: Employee Login
 * Redirects employees directly to the Razorpay payroll portal.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wp_safe_redirect( sam_employee_portal_url() );
exit;
