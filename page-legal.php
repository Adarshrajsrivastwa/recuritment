<?php
/**
 * Template Name: Legal Page
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$slug = get_post_field( 'post_name', get_queried_object_id() );
$sections = array(
	'privacy-policy' => array(
		'title'   => 'Privacy Policy',
		'updated' => 'September 2026',
		'blocks'  => array(
			array(
				'heading' => 'Information We Collect',
				'body'    => 'We may collect contact details, employment information, resume data, and communication records when you submit a form, register as a candidate, or contact our team.',
			),
			array(
				'heading' => 'How We Use Your Information',
				'body'    => 'Your information is used to process hiring requirements, evaluate candidate profiles, deliver payroll services, respond to inquiries, and improve our recruitment and staffing operations.',
			),
			array(
				'heading' => 'Data Sharing',
				'body'    => 'We share information only with authorized clients, service providers, and regulators where required for recruitment, payroll, or legal compliance. We do not sell personal data.',
			),
			array(
				'heading' => 'Data Retention & Security',
				'body'    => 'We retain records only as long as needed for business, legal, or contractual purposes and apply reasonable technical and organizational safeguards to protect your data.',
			),
			array(
				'heading' => 'Your Rights',
				'body'    => 'You may request access, correction, or deletion of your personal information by contacting us using the details on our Contact page.',
			),
		),
	),
	'terms-of-service' => array(
		'title'   => 'Terms of Service',
		'updated' => 'September 2026',
		'blocks'  => array(
			array(
				'heading' => 'Use of Website',
				'body'    => 'By accessing this website, you agree to use it only for lawful purposes related to recruitment, staffing, payroll, or employment services offered by SAM Manpower.',
			),
			array(
				'heading' => 'Service Scope',
				'body'    => 'Information on this website is provided for general guidance. Final service terms, fees, timelines, and deliverables are confirmed separately in client agreements or written communication.',
			),
			array(
				'heading' => 'Candidate & Client Responsibilities',
				'body'    => 'Users must provide accurate information in forms and submissions. Misrepresentation, unauthorized data use, or misuse of the website may result in refusal of service.',
			),
			array(
				'heading' => 'Limitation of Liability',
				'body'    => 'SAM Manpower is not liable for indirect, incidental, or consequential damages arising from website use, except where liability cannot be excluded under applicable law.',
			),
			array(
				'heading' => 'Governing Law',
				'body'    => 'These terms are governed by the laws of India. Disputes shall be subject to the jurisdiction of competent courts in Uttar Pradesh, India.',
			),
		),
	),
	'cookie-policy' => array(
		'title'   => 'Cookie Policy',
		'updated' => 'September 2026',
		'blocks'  => array(
			array(
				'heading' => 'What Are Cookies',
				'body'    => 'Cookies are small text files stored on your device to help websites function, remember preferences, and understand how visitors use the site.',
			),
			array(
				'heading' => 'Cookies We Use',
				'body'    => 'We may use essential cookies for security and form functionality, analytics cookies to measure traffic and performance, and preference cookies to improve user experience.',
			),
			array(
				'heading' => 'Managing Cookies',
				'body'    => 'You can control or delete cookies through your browser settings. Disabling essential cookies may affect form submissions or site functionality.',
			),
			array(
				'heading' => 'Third-Party Cookies',
				'body'    => 'Embedded tools such as analytics, fonts, or external portals may set their own cookies. Please review the policies of those providers where applicable.',
			),
			array(
				'heading' => 'Contact',
				'body'    => 'For questions about this Cookie Policy, contact us through the details listed on our Contact page.',
			),
		),
	),
);

$page = isset( $sections[ $slug ] ) ? $sections[ $slug ] : null;
?>

<section class="page-hero page-hero-simple">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<h1><?php echo esc_html( $page ? $page['title'] : get_the_title() ); ?></h1>
		<?php if ( $page ) : ?>
			<p>Last updated: <?php echo esc_html( $page['updated'] ); ?></p>
		<?php endif; ?>
	</div>
</section>

<section class="section">
	<div class="container container-narrow legal-content">
		<?php if ( $page ) : ?>
			<?php foreach ( $page['blocks'] as $block ) : ?>
				<div class="legal-block">
					<h2><?php echo esc_html( $block['heading'] ); ?></h2>
					<p><?php echo esc_html( $block['body'] ); ?></p>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
