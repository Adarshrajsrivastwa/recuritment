<?php
/**
 * Template Name: Contract-to-Hire
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>

<!-- EXECUTIVE C2H HERO -->
<section class="page-hero c2h-hero">
	<div class="hero-overlay"></div>
	<div class="container page-hero-inner">
		<div class="hero-content-wrapper">
			<div class="eyebrow-pill-row">
				<span class="eyebrow-badge">
					<span class="pulse-dot" style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#10B981; margin-right:6px; box-shadow:0 0 8px #10B981;"></span>
					Contract-to-Hire (C2H) Framework
				</span>
				<span class="eyebrow-extra" style="font-size:0.8rem; color:#94A3B8; font-weight:600;">⚡ 90-Day Risk-Free Trial Model</span>
			</div>
			
			<h1 style="margin-top:16px; font-size:2.8rem; line-height:1.15; font-weight:800; letter-spacing:-0.02em;">
				Evaluate on the Job. <br>
				<span style="background:linear-gradient(90deg, #38BDF8 0%, #818CF8 100%); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">Convert with 100% Certainty.</span>
			</h1>
			
			<p style="font-size:1.12rem; color:#CBD5E1; max-width:760px; line-height:1.65; margin-top:18px;">
				Skip the high-stakes gamble of traditional permanent hiring. Deploy elite engineering, operations, and commercial talent on SAM’s legal payroll for a 3–6 month trial. Test actual project execution, cultural grit, and team chemistry before signing permanent headcount.
			</p>

			<div class="hero-actions" style="margin-top:28px; display:flex; gap:16px; flex-wrap:wrap;">
				<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" style="padding:14px 28px; font-size:1rem; font-weight:700;">
					<?php echo sam_icon('users'); ?> Start a C2H Engagement
				</a>
				<a href="#c2h-lifecycle" class="btn btn-outline-light" style="padding:14px 26px; font-size:1rem;">
					<?php echo sam_icon('calendar'); ?> How C2H Works
				</a>
			</div>

			<!-- HERO STATS STRIP -->
			<div class="hero-stats-row" style="margin-top:36px; display:flex; gap:20px; flex-wrap:wrap; border-top:1px solid rgba(255,255,255,0.1); padding-top:24px;">
				<div class="hero-stat-pill" style="background:rgba(255,255,255,0.06); padding:8px 18px; border-radius:100px; font-size:0.88rem; color:#E2E8F0; border:1px solid rgba(255,255,255,0.1);">
					<strong style="color:#38BDF8;">3–6 Months</strong> Trial Window
				</div>
				<div class="hero-stat-pill" style="background:rgba(255,255,255,0.06); padding:8px 18px; border-radius:100px; font-size:0.88rem; color:#E2E8F0; border:1px solid rgba(255,255,255,0.1);">
					<strong style="color:#10B981;">92%</strong> Conversion Rate
				</div>
				<div class="hero-stat-pill" style="background:rgba(255,255,255,0.06); padding:8px 18px; border-radius:100px; font-size:0.88rem; color:#E2E8F0; border:1px solid rgba(255,255,255,0.1);">
					<strong style="color:#F59E0B;">Zero</strong> Severance Liability
				</div>
				<div class="hero-stat-pill" style="background:rgba(255,255,255,0.06); padding:8px 18px; border-radius:100px; font-size:0.88rem; color:#E2E8F0; border:1px solid rgba(255,255,255,0.1);">
					<strong style="color:#A78BFA;">48–72h</strong> First Shortlist SLA
				</div>
			</div>
		</div>
	</div>
</section>

<!-- THE PROBLEM VS THE C2H SOLUTION -->
<section class="section" style="padding:70px 0; background:#fff;">
	<div class="container">
		<div class="section-head text-center" style="max-width:760px; margin:0 auto 48px;">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('target'); ?> The Hiring Paradigm Shift</span>
			<h2 style="font-size:2.2rem; font-weight:800; color:#0F172A; margin-top:12px;">Why 76% of Traditional Hires Fail the 6-Month Test</h2>
			<p style="font-size:1.05rem; color:#64748B; line-height:1.6;">
				Interviews measure charisma and presentation polish — not real-world sprint velocity, code quality, or how someone behaves under production outages. C2H replaces intuition with indisputable proof.
			</p>
		</div>

		<div class="grid-2" style="gap:32px;">
			<!-- Conventional Permanent Hiring Box -->
			<div style="background:#FFF5F5; border:1.5px solid #FED7D7; border-radius:20px; padding:36px; position:relative;">
				<div style="display:inline-block; background:#E53E3E; color:#fff; font-size:0.75rem; font-weight:800; text-transform:uppercase; letter-spacing:0.06em; padding:4px 12px; border-radius:100px; margin-bottom:16px;">
					Traditional Permanent Hiring
				</div>
				<h3 style="font-size:1.4rem; color:#9B2C2C; margin-bottom:16px; font-weight:700;">High Stakes, Slow Recourse</h3>
				<ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:14px;">
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#742A2A; line-height:1.5;">
						<span style="color:#E53E3E; font-weight:bold; font-size:1.1rem;">✕</span>
						<span><strong>Blind Commitment:</strong> You make permanent commitments based on a few 45-minute interviews and references who rarely share negatives.</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#742A2A; line-height:1.5;">
						<span style="color:#E53E3E; font-weight:bold; font-size:1.1rem;">✕</span>
						<span><strong>Painful Severance &amp; Legal Friction:</strong> Parting ways with an underperforming permanent employee takes months of PIPs, HR friction, and severance payouts.</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#742A2A; line-height:1.5;">
						<span style="color:#E53E3E; font-weight:bold; font-size:1.1rem;">✕</span>
						<span><strong>Immediate Full Sunk Cost:</strong> Agency placement fee is fully payable upfront, even if the person leaves within 95 days.</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#742A2A; line-height:1.5;">
						<span style="color:#E53E3E; font-weight:bold; font-size:1.1rem;">✕</span>
						<span><strong>Headcount Cap Paralysis:</strong> Frozen permanent headcount stops projects cold, even when urgent customer work is on the line.</span>
					</li>
				</ul>
			</div>

			<!-- SAM C2H Advantage Box -->
			<div style="background:#F0FDF4; border:1.5px solid #BBF7D0; border-radius:20px; padding:36px; position:relative; box-shadow:0 12px 30px rgba(16,185,129,0.08);">
				<div style="display:inline-block; background:#059669; color:#fff; font-size:0.75rem; font-weight:800; text-transform:uppercase; letter-spacing:0.06em; padding:4px 12px; border-radius:100px; margin-bottom:16px;">
					SAM Contract-to-Hire Advantage
				</div>
				<h3 style="font-size:1.4rem; color:#065F46; margin-bottom:16px; font-weight:700;">Audition First, Permanent When Proven</h3>
				<ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:14px;">
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#166534; line-height:1.5;">
						<span style="color:#059669; font-weight:bold; font-size:1.1rem;">✓</span>
						<span><strong>Real Output Validation:</strong> Observe the engineer's pull requests, bug resolution time, and team collaboration on actual project deliverables.</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#166534; line-height:1.5;">
						<span style="color:#059669; font-weight:bold; font-size:1.1rem;">✓</span>
						<span><strong>Zero Severance or Legal Liability:</strong> If the fit isn't right, the contract concludes cleanly without HR disputes or severance obligations.</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#166534; line-height:1.5;">
						<span style="color:#059669; font-weight:bold; font-size:1.1rem;">✓</span>
						<span><strong>Preserve Headcount Budget:</strong> Funded via operational project expenses (OpEx) rather than fixed permanent headcount caps (CapEx).</span>
					</li>
					<li style="display:flex; gap:12px; font-size:0.95rem; color:#166534; line-height:1.5;">
						<span style="color:#059669; font-weight:bold; font-size:1.1rem;">✓</span>
						<span><strong>Frictionless Conversion:</strong> Once validated, roll the professional into your permanent team with transparent, predetermined terms.</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<!-- STEP-BY-STEP LIFECYCLE ROADMAP -->
<section class="section" id="c2h-lifecycle" style="padding:80px 0; background:#F8FAFC; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0;">
	<div class="container">
		<div class="section-head text-center" style="max-width:760px; margin:0 auto 50px;">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('refresh'); ?> Predictable 4-Stage Journey</span>
			<h2 style="font-size:2.2rem; font-weight:800; color:#0F172A; margin-top:12px;">How the SAM C2H Model Works</h2>
			<p style="font-size:1.05rem; color:#64748B; line-height:1.6;">
				From initial briefing to permanent onboarding ceremony, our process guarantees compliance, speed, and continuous support.
			</p>
		</div>

		<div class="grid-4" style="gap:24px;">
			<!-- Step 1 -->
			<div style="background:#fff; border-radius:18px; padding:32px 26px; border:1px solid #E2E8F0; box-shadow:0 8px 24px rgba(0,0,0,0.04); display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden;">
				<div style="position:absolute; top:16px; right:20px; font-size:2.4rem; font-weight:900; color:#F1F5F9; line-height:1;">01</div>
				<div>
					<div style="width:52px; height:52px; border-radius:14px; background:#EFF6FF; color:#2563EB; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
						<?php echo sam_icon('search'); ?>
					</div>
					<div style="font-size:0.75rem; font-weight:700; color:#2563EB; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:6px;">Day 0 – 5</div>
					<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:12px;">Targeted C2H Sourcing</h3>
					<p style="font-size:0.9rem; color:#64748B; line-height:1.55; margin:0;">
						We screen for professionals open to proving themselves in a trial-to-hire engagement. Comprehensive vetting includes code tests, technical interviews, and reference checks.
					</p>
				</div>
				<div style="margin-top:20px; padding-top:14px; border-top:1px dashed #E2E8F0; font-size:0.82rem; font-weight:600; color:#059669; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> 3–5 Curated CVs in 48h
				</div>
			</div>

			<!-- Step 2 -->
			<div style="background:#fff; border-radius:18px; padding:32px 26px; border:1px solid #E2E8F0; box-shadow:0 8px 24px rgba(0,0,0,0.04); display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden;">
				<div style="position:absolute; top:16px; right:20px; font-size:2.4rem; font-weight:900; color:#F1F5F9; line-height:1;">02</div>
				<div>
					<div style="width:52px; height:52px; border-radius:14px; background:#ECFDF5; color:#059669; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
						<?php echo sam_icon('briefcase'); ?>
					</div>
					<div style="font-size:0.75rem; font-weight:700; color:#059669; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:6px;">Day 6 – 14</div>
					<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:12px;">Deployment on SAM Payroll</h3>
					<p style="font-size:0.9rem; color:#64748B; line-height:1.55; margin:0;">
						Candidate is legally onboarded on SAM’s payroll. We issue employment agreements, execute NDA &amp; IP assignments, and set up statutory PF/ESIC accounts.
					</p>
				</div>
				<div style="margin-top:20px; padding-top:14px; border-top:1px dashed #E2E8F0; font-size:0.82rem; font-weight:600; color:#059669; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> Zero Co-Employment Risk
				</div>
			</div>

			<!-- Step 3 -->
			<div style="background:#fff; border-radius:18px; padding:32px 26px; border:1px solid #E2E8F0; box-shadow:0 8px 24px rgba(0,0,0,0.04); display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden;">
				<div style="position:absolute; top:16px; right:20px; font-size:2.4rem; font-weight:900; color:#F1F5F9; line-height:1;">03</div>
				<div>
					<div style="width:52px; height:52px; border-radius:14px; background:#FEF3C7; color:#D97706; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
						<?php echo sam_icon('star'); ?>
					</div>
					<div style="font-size:0.75rem; font-weight:700; color:#D97706; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:6px;">Month 1 – 3 or 6</div>
					<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:12px;">Real-World On-the-Job Trial</h3>
					<p style="font-size:0.9rem; color:#64748B; line-height:1.55; margin:0;">
						The talent works directly inside your team, attending daily standups and shipping code. SAM conducts monthly performance pulse checks with your managers.
					</p>
				</div>
				<div style="margin-top:20px; padding-top:14px; border-top:1px dashed #E2E8F0; font-size:0.82rem; font-weight:600; color:#059669; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> 10-Day Free Replacement
				</div>
			</div>

			<!-- Step 4 -->
			<div style="background:linear-gradient(135deg, #0F172A 0%, #1E293B 100%); color:#fff; border-radius:18px; padding:32px 26px; border:1px solid #334155; box-shadow:0 12px 30px rgba(0,0,0,0.12); display:flex; flex-direction:column; justify-content:space-between; position:relative; overflow:hidden;">
				<div style="position:absolute; top:16px; right:20px; font-size:2.4rem; font-weight:900; color:rgba(255,255,255,0.06); line-height:1;">04</div>
				<div>
					<div style="width:52px; height:52px; border-radius:14px; background:rgba(56,189,248,0.2); color:#38BDF8; display:flex; align-items:center; justify-content:center; margin-bottom:20px;">
						<?php echo sam_icon('trophy'); ?>
					</div>
					<div style="font-size:0.75rem; font-weight:700; color:#38BDF8; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:6px;">Milestone Reached</div>
					<h3 style="font-size:1.25rem; font-weight:700; color:#fff; margin-bottom:12px;">Permanent Roll-Over</h3>
					<p style="font-size:0.9rem; color:#94A3B8; line-height:1.55; margin:0;">
						Impressed by their performance? Seamlessly absorb them onto your direct payroll with pre-negotiated nominal transfer fees. Zero notice waiting period.
					</p>
				</div>
				<div style="margin-top:20px; padding-top:14px; border-top:1px dashed rgba(255,255,255,0.15); font-size:0.82rem; font-weight:600; color:#38BDF8; display:flex; align-items:center; gap:6px;">
					<?php echo sam_icon('check'); ?> 100% Retained &amp; Onboarded
				</div>
			</div>
		</div>
	</div>
</section>

<!-- COMPARISON MATRIX: PERMANENT VS CONTRACT-TO-HIRE -->
<section class="section" style="padding:70px 0; background:#fff;">
	<div class="container">
		<div class="section-head text-center" style="max-width:760px; margin:0 auto 40px;">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('shield'); ?> Side-by-Side Comparison</span>
			<h2 style="font-size:2.2rem; font-weight:800; color:#0F172A; margin-top:12px;">Direct Placement vs. SAM Contract-to-Hire</h2>
			<p style="font-size:1.05rem; color:#64748B; line-height:1.6;">
				How the C2H engagement structure de-risks key organizational KPIs.
			</p>
		</div>

		<div style="overflow-x:auto; border-radius:16px; border:1px solid #E2E8F0; box-shadow:0 10px 30px rgba(0,0,0,0.04);">
			<table style="width:100%; border-collapse:collapse; text-align:left; font-size:0.95rem;">
				<thead>
					<tr style="background:#0F172A; color:#fff;">
						<th style="padding:18px 24px; font-weight:700; width:28%;">Decision Factor</th>
						<th style="padding:18px 24px; font-weight:600; color:#94A3B8; width:36%;">Standard Direct Hire</th>
						<th style="padding:18px 24px; font-weight:700; color:#38BDF8; width:36%; background:#1E293B;">SAM Contract-to-Hire (C2H)</th>
					</tr>
				</thead>
				<tbody>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Evaluation Window</td>
						<td style="padding:16px 24px; color:#64748B;">2–3 interview rounds (approx. 2–3 hours total)</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> 500 to 1,000 real working hours on your codebase</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Severance &amp; Firing Cost</td>
						<td style="padding:16px 24px; color:#DC2626;">1–3 months salary severance + legal risk</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> ₹0 Severance. Contract finishes cleanly on SAM payroll</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Budget Source</td>
						<td style="padding:16px 24px; color:#64748B;">Fixed CapEx / Permanent Headcount quota</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Flexible Project OpEx / Vendor services expense</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Time-to-Start</td>
						<td style="padding:16px 24px; color:#64748B;">60–90 days (standard Indian notice periods)</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> 3 to 15 days (active immediate talent pool)</td>
					</tr>
					<tr style="border-bottom:1px solid #F1F5F9;">
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Statutory &amp; Labour Compliance</td>
						<td style="padding:16px 24px; color:#64748B;">Internal HR manages PF, ESIC, Gratuity, audits</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> 100% managed by SAM under ISO 9001:2015 system</td>
					</tr>
					<tr>
						<td style="padding:16px 24px; font-weight:600; color:#1E293B;">Candidate Culture Fit</td>
						<td style="padding:16px 24px; color:#64748B;">Subjective guess from behavioral questions</td>
						<td style="padding:16px 24px; color:#0F172A; font-weight:600; background:#F0FDF4;"><span style="color:#16A34A; margin-right:6px;">✓</span> Validated daily in team retrospectives &amp; peer reviews</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>

<!-- ROLES BEST SUITED FOR C2H -->
<section class="section" style="padding:70px 0; background:#F8FAFC; border-top:1px solid #E2E8F0; border-bottom:1px solid #E2E8F0;">
	<div class="container">
		<div class="section-head text-center" style="max-width:760px; margin:0 auto 40px;">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('laptop'); ?> Strategic Deployment</span>
			<h2 style="font-size:2.2rem; font-weight:800; color:#0F172A; margin-top:12px;">Top Roles Deployed on Contract-to-Hire</h2>
			<p style="font-size:1.05rem; color:#64748B; line-height:1.6;">
				C2H is ideal for high-impact technical roles and niche leadership where mis-hires carry severe project consequences.
			</p>
		</div>

		<div class="grid-3" style="gap:24px;">
			<!-- Tech Card -->
			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#EFF6FF; color:#2563EB; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('laptop'); ?>
				</div>
				<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:10px;">Engineering &amp; Cloud</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5; margin-bottom:16px;">
					Evaluate real architecture design, code readability, test coverage, and documentation discipline.
				</p>
				<ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:8px; font-size:0.85rem; color:#334155;">
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#2563EB;">•</span> Full-Stack &amp; Backend Leads (Java, Python, Go)</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#2563EB;">•</span> Cloud Architects &amp; DevOps (AWS, Kubernetes)</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#2563EB;">•</span> AI/ML &amp; Data Pipeline Engineers</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#2563EB;">•</span> QA Automation Specialists (Cypress, Playwright)</li>
				</ul>
				<div style="margin-top:18px; padding-top:12px; border-top:1px solid #F1F5F9; font-size:0.8rem; font-weight:700; color:#10B981;">
					⚡ Typical Trial: 3 Months &bull; 94% Conversion
				</div>
			</div>

			<!-- Plant & Operations -->
			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#FEF3C7; color:#D97706; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('target'); ?>
				</div>
				<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:10px;">Plant &amp; Industrial Leads</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5; margin-bottom:16px;">
					Verify shop-floor leadership, shift adherence, safety compliance, and throughput management.
				</p>
				<ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:8px; font-size:0.85rem; color:#334155;">
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#D97706;">•</span> Shift Supervisors &amp; Production Engineers</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#D97706;">•</span> QA/QC &amp; Six Sigma Black Belts</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#D97706;">•</span> Maintenance &amp; PLC Automation Leads</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#D97706;">•</span> Supply Chain &amp; Procurement Specialists</li>
				</ul>
				<div style="margin-top:18px; padding-top:12px; border-top:1px solid #F1F5F9; font-size:0.8rem; font-weight:700; color:#10B981;">
					⚡ Typical Trial: 3–6 Months &bull; 90% Conversion
				</div>
			</div>

			<!-- Commercial & Sales -->
			<div style="background:#fff; border-radius:16px; padding:28px; border:1px solid #E2E8F0; box-shadow:0 4px 14px rgba(0,0,0,0.03);">
				<div style="width:46px; height:46px; border-radius:12px; background:#ECFDF5; color:#059669; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
					<?php echo sam_icon('users'); ?>
				</div>
				<h3 style="font-size:1.25rem; font-weight:700; color:#0F172A; margin-bottom:10px;">Commercial &amp; Growth</h3>
				<p style="font-size:0.88rem; color:#64748B; line-height:1.5; margin-bottom:16px;">
					Test deal pipeline generation, executive pitching, client relationship nurturing, and quota attainment.
				</p>
				<ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:8px; font-size:0.85rem; color:#334155;">
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#059669;">•</span> Enterprise B2B Account Executives</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#059669;">•</span> Pre-Sales Solutions Architects</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#059669;">•</span> Product Marketing &amp; Growth Managers</li>
					<li style="display:flex; align-items:center; gap:8px;"><span style="color:#059669;">•</span> Customer Success &amp; Retention Leads</li>
				</ul>
				<div style="margin-top:18px; padding-top:12px; border-top:1px solid #F1F5F9; font-size:0.8rem; font-weight:700; color:#10B981;">
					⚡ Typical Trial: 3 Months &bull; 88% Conversion
				</div>
			</div>
		</div>
	</div>
</section>

<!-- SAM ASSURED INTEGRATION & SHIELD -->
<section class="section" style="padding:70px 0; background:#0F172A; color:#fff;">
	<div class="container">
		<div style="display:grid; grid-template-columns:1.2fr 0.8fr; gap:40px; align-items:center;">
			<div>
				<span class="eyebrow-badge" style="background:rgba(56,189,248,0.15); color:#38BDF8; border:1px solid rgba(56,189,248,0.3);">
					<?php echo sam_icon('shield'); ?> Premium Assurance Program
				</span>
				<h2 style="color:#fff; font-size:2.2rem; font-weight:800; margin-top:16px; line-height:1.25;">
					Take C2H Further with <span style="color:#38BDF8;">SAM Assured</span>
				</h2>
				<p style="color:#94A3B8; font-size:1.05rem; line-height:1.65; margin-top:16px;">
					For mission-critical roles, SAM Assured provides guaranteed replacement within 10 days, weekly candidate satisfaction syncs, counter-offer defense, and dedicated senior account director oversight throughout the evaluation tenure.
				</p>
				<div style="display:flex; gap:16px; margin-top:24px; flex-wrap:wrap;">
					<a href="<?php echo esc_url( sam_get_page_url_by_slug( 'sam-assured' ) ); ?>" class="btn btn-primary" style="background:#2563EB;">
						Explore SAM Assured
					</a>
					<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-outline-light">
						Request a C2H Proposal
					</a>
				</div>
			</div>

			<div style="background:#1E293B; border:1px solid rgba(255,255,255,0.1); border-radius:20px; padding:32px; box-shadow:0 12px 30px rgba(0,0,0,0.2);">
				<h3 style="color:#fff; font-size:1.2rem; margin-bottom:16px; display:flex; align-items:center; gap:8px;">
					<span style="color:#10B981;"><?php echo sam_icon('check'); ?></span> The C2H Security Guarantee
				</h3>
				<div style="display:flex; flex-direction:column; gap:12px;">
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #10B981;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">10-Day Free Replacement</div>
						<div style="font-size:0.82rem; color:#94A3B8;">Candidate not performing in week 1? Zero invoice &amp; replacement in 72h.</div>
					</div>
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #38BDF8;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">Ironclad IP &amp; Code Ownership</div>
						<div style="font-size:0.82rem; color:#94A3B8;">All intellectual property generated during trial belongs 100% to your firm.</div>
					</div>
					<div style="background:rgba(255,255,255,0.04); padding:12px 16px; border-radius:10px; border-left:3px solid #F59E0B;">
						<div style="font-weight:700; color:#fff; font-size:0.95rem;">Predictable Conversion Fee</div>
						<div style="font-size:0.82rem; color:#94A3B8;">No surprise buyout markups; predetermined tiered conversion schedule.</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS -->
<section class="section" style="padding:70px 0; background:#fff;">
	<div class="container" style="max-width:860px;">
		<div class="section-head text-center" style="margin-bottom:40px;">
			<span class="eyebrow-badge eyebrow-badge-dark"><?php echo sam_icon('chat'); ?> Clear Answers</span>
			<h2 style="font-size:2rem; font-weight:800; color:#0F172A; margin-top:12px;">Contract-to-Hire FAQs</h2>
			<p style="font-size:1rem; color:#64748B;">Common questions from CTOs, Engineering VPs, and Talent Acquisition Heads.</p>
		</div>

		<div class="c2h-faq-stack" style="display:flex; flex-direction:column; gap:16px;">
			<details style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:18px 22px; cursor:pointer;" open>
				<summary style="font-weight:700; font-size:1.05rem; color:#0F172A; outline:none;">What happens if the candidate does not perform during the trial?</summary>
				<p style="margin-top:12px; font-size:0.92rem; color:#64748B; line-height:1.6;">
					There is zero financial or legal severance liability for your company. You can terminate the contract with a standard 7–14 days notice. SAM handles all offboarding, final settlement, and immediately presents replacement profiles without charging a new recruitment fee.
				</p>
			</details>

			<details style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:18px 22px; cursor:pointer;">
				<summary style="font-weight:700; font-size:1.05rem; color:#0F172A; outline:none;">Who handles the employee's payroll and compliance during the trial?</summary>
				<p style="margin-top:12px; font-size:0.92rem; color:#64748B; line-height:1.6;">
					The candidate is an employee of SAM Manpower &amp; Career Services during the trial period. SAM manages salary disbursement, PF, ESIC, Professional Tax, TDS, and statutory insurance. Your team only receives one straightforward monthly vendor invoice.
				</p>
			</details>

			<details style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:18px 22px; cursor:pointer;">
				<summary style="font-weight:700; font-size:1.05rem; color:#0F172A; outline:none;">How quickly can a C2H candidate start?</summary>
				<p style="margin-top:12px; font-size:0.92rem; color:#64748B; line-height:1.6;">
					Because our C2H talent pool targets professionals serving notice or available immediately, candidates can typically be deployed within 3 to 15 business days — saving 60+ days compared to traditional 90-day notice periods.
				</p>
			</details>

			<details style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:12px; padding:18px 22px; cursor:pointer;">
				<summary style="font-weight:700; font-size:1.05rem; color:#0F172A; outline:none;">Can we convert the candidate before the 3 or 6 month mark?</summary>
				<p style="margin-top:12px; font-size:0.92rem; color:#64748B; line-height:1.6;">
					Yes! If you are thoroughly impressed with their work after 60 days and wish to convert early, our tiered conversion schedule allows an accelerated rollout onto your direct payroll at any time.
				</p>
			</details>
		</div>
	</div>
</section>

<!-- BOTTOM HIGH-CONVERTING CTA BAND -->
<section class="section cta-band" style="background:linear-gradient(135deg, #070D1E 0%, #0F172A 100%); padding:70px 0; border-top:1px solid rgba(255,255,255,0.08); text-align:center;">
	<div class="container cta-band-inner" style="max-width:800px; margin:0 auto;">
		<span class="eyebrow-badge" style="background:rgba(56,189,248,0.15); color:#38BDF8; border:1px solid rgba(56,189,248,0.3); margin-bottom:16px;">
			<?php echo sam_icon('trophy'); ?> Zero-Risk Talent Acquisition
		</span>
		<h2 style="font-size:2.4rem; font-weight:800; color:#fff; line-height:1.2; margin-top:8px;">
			Ready to evaluate top performers before you commit?
		</h2>
		<p style="font-size:1.1rem; color:#94A3B8; margin:16px auto 28px; line-height:1.6;">
			Share your job description. We’ll deliver 3–5 pre-screened C2H profiles ready to begin trial within 48–72 hours.
		</p>
		<div class="hero-actions" style="justify-content:center; display:flex; gap:16px; flex-wrap:wrap;">
			<a href="<?php echo esc_url( sam_hire_form_url() ); ?>" class="btn btn-primary" style="padding:15px 32px; font-size:1.05rem; font-weight:700;">
				<?php echo sam_icon('users'); ?> Start a C2H Engagement
			</a>
			<a href="<?php echo esc_url( sam_contact_url() ); ?>" class="btn btn-outline-light" style="padding:15px 28px; font-size:1.05rem;">
				<?php echo sam_icon('chat'); ?> Speak with a C2H Specialist
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
