(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* ================================================================
		   MOBILE NAV
		   ================================================================ */
		var toggle = document.getElementById('menu-toggle');
		var nav    = document.getElementById('main-navigation');
		var body   = document.body;

		function setMobileNavState(isOpen) {
			if (!nav || !toggle) return;
			nav.classList.toggle('is-open', isOpen);
			body.classList.toggle('nav-open', isOpen);
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		}
		function closeMobileNav() { setMobileNavState(false); }

		if (toggle && nav) {
			toggle.addEventListener('click', function () {
				setMobileNavState(!nav.classList.contains('is-open'));
			});
			document.addEventListener('keydown', function (e) {
				if (e.key === 'Escape') closeMobileNav();
			});
			window.addEventListener('resize', function () {
				if (window.innerWidth > 782) closeMobileNav();
			});
			nav.querySelectorAll('a').forEach(function (link) {
				link.addEventListener('click', closeMobileNav);
			});
		}

		/* ================================================================
		   FAQ ACCORDION
		   ================================================================ */
		var faqButtons = document.querySelectorAll('.faq-question');
		faqButtons.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var item   = btn.closest('.faq-item');
				var answer = item.querySelector('.faq-answer');
				var isOpen = btn.getAttribute('aria-expanded') === 'true';

				faqButtons.forEach(function (other) {
					if (other !== btn) {
						other.setAttribute('aria-expanded', 'false');
						var otherItem = other.closest('.faq-item');
						if (otherItem) {
							var oa = otherItem.querySelector('.faq-answer');
							if (oa) oa.style.maxHeight = null;
						}
					}
				});

				btn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
				if (answer) {
					answer.style.maxHeight = isOpen ? null : answer.scrollHeight + 'px';
				}
			});
		});

		/* ================================================================
		   ONE-PAGE NAV SECTION HIGHLIGHTING
		   ================================================================ */
		if (nav) {
			var navItems    = nav.querySelectorAll('.nav-menu li');
			var sectionLinks = [];
			var header      = document.getElementById('site-header');

			nav.querySelectorAll('.nav-menu a[href*="#"]').forEach(function (link) {
				var hash    = (link.getAttribute('href') || '').split('#')[1];
				var section = hash ? document.getElementById(hash) : null;
				if (section) sectionLinks.push({ link: link, section: section });
			});

			if (sectionLinks.length) {
				function setActiveNavItem() {
					var headerHeight = header ? header.offsetHeight : 0;
					var activeLink   = null;
					var activePos    = -Infinity;
					sectionLinks.forEach(function (item) {
						var top = item.section.getBoundingClientRect().top;
						if (top <= headerHeight + 24 && top > activePos) {
							activeLink = item.link;
							activePos  = top;
						}
					});
					navItems.forEach(function (i) { i.classList.remove('current-menu-item'); });
					if (activeLink) activeLink.parentElement.classList.add('current-menu-item');
				}
				window.addEventListener('scroll', setActiveNavItem, { passive: true });
				window.addEventListener('hashchange', setActiveNavItem);
				setActiveNavItem();
			}
		}

		/* ================================================================
		   CANDIDATE FORM — notice period + file preview
		   ================================================================ */
		var noticeRadios  = document.querySelectorAll('.toggle-notice-doc');
		var noticeDocBox  = document.getElementById('notice_doc_container');
		var noticeFileInput = document.getElementById('notice_doc');

		if (noticeRadios.length && noticeDocBox) {
			function updateNoticeDocVisibility() {
				var selected = document.querySelector('input[name="serving_notice"]:checked');
				var show = selected && selected.value === 'Yes';
				noticeDocBox.classList.toggle('hidden-field', !show);
				noticeDocBox.style.display = show ? 'block' : 'none';
				if (noticeFileInput) {
					show ? noticeFileInput.setAttribute('required','required')
					     : noticeFileInput.removeAttribute('required');
				}
			}
			noticeRadios.forEach(function (r) { r.addEventListener('change', updateNoticeDocVisibility); });
			updateNoticeDocVisibility();
		}

		function bindFilePreview(inputId, previewId) {
			var fi = document.getElementById(inputId);
			var pr = document.getElementById(previewId);
			if (fi && pr) {
				fi.addEventListener('change', function () {
					if (fi.files && fi.files[0]) {
						var f    = fi.files[0];
						var size = (f.size / (1024 * 1024)).toFixed(2);
						pr.textContent = 'Selected: ' + f.name + ' (' + size + ' MB)';
						pr.classList.add('has-file');
					} else {
						pr.textContent = '';
						pr.classList.remove('has-file');
					}
				});
			}
		}
		bindFilePreview('resume_file', 'resume_file_name');
		bindFilePreview('notice_doc',  'notice_doc_name');

		/* ================================================================
		   ANIMATED NUMBER COUNTER
		   Helper: counts element from 0 to its text value over ~1.4s
		   ================================================================ */
		function animateCounter(el) {
			var raw    = el.textContent.replace(/[^0-9.]/g, '');
			var target = parseFloat(raw);
			if (isNaN(target) || target === 0) return;

			var suffix = el.textContent.replace(/[0-9.]/g, '');
			var start  = performance.now();
			var dur    = 1400; // ms

			function easeOutExpo(t) {
				return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
			}

			function tick(now) {
				var elapsed  = now - start;
				var progress = Math.min(elapsed / dur, 1);
				var eased    = easeOutExpo(progress);
				var current  = target * eased;

				// Format: keep decimals only if target has them
				var display = target % 1 === 0
					? Math.round(current).toString()
					: current.toFixed(1);

				el.textContent = display + suffix;

				if (progress < 1) {
					requestAnimationFrame(tick);
				} else {
					el.textContent = raw + suffix; // ensure exact final value
				}
			}
			requestAnimationFrame(tick);
		}

		/* ================================================================
		   SCROLL-REVEAL + STAGGER OBSERVER
		   ================================================================ */
		if (!('IntersectionObserver' in window)) return;

		/* — Stagger groups: add class once to parent, CSS handles children — */
		var staggerGroups = [
			'.fp-bottleneck-cards',
			'.fp-difference-grid',
			'.fp-capabilities-grid',
			'.fp-process-track',
			'.fp-domains-grid',
			'.fp-cases-grid',
			'.fp-impact-grid',
			'.grid-3.testimonial-grid',
			'.fp-cand-highlights',
			'.fp-partner-points',
			'.fp-focus-cards-stacked',
			'.assured-steps',
			'.fp-caps-chips',
			'.faq-accordion',
			'.fp-fcta-stat-strip',
			'.stats-grid.fp-stats-grid',
		];

		var staggerObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					staggerObserver.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

		staggerGroups.forEach(function (sel) {
			document.querySelectorAll(sel).forEach(function (el) {
				el.classList.add('sam-stagger');
				staggerObserver.observe(el);
			});
		});

		/* — Individual reveal elements — */
		var revealSelectors = [
			'.section-head',
			'.fp-bottleneck-copy',
			'.fp-focus-copy',
			'.fp-partner-copy',
			'.fp-cand-copy',
			'.assured-copy',
			'.fp-ef-copy',
			'.fp-hero-right',
			'.fp-partner-media',
			'.fp-focus-visual',
			'.fp-timeline-card',
		];

		var revealObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					revealObserver.unobserve(entry.target);
				}
			});
		}, { threshold: 0.1, rootMargin: '0px 0px -30px 0px' });

		revealSelectors.forEach(function (sel) {
			document.querySelectorAll(sel).forEach(function (el, idx) {
				// Alternate direction for visual interest
				el.classList.add('sam-reveal');
				if (sel.indexOf('copy') !== -1) el.classList.add('sam-reveal--left');
				if (sel.indexOf('media') !== -1 || sel.indexOf('visual') !== -1) el.classList.add('sam-reveal--right');
				revealObserver.observe(el);
			});
		});

		/* — Stat/Impact counter observer — */
		var counterObserver = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.querySelectorAll('.stat-num, .fp-impact-num').forEach(function (numEl) {
						// Only animate if it looks like a number
						var raw = numEl.textContent.replace(/[^0-9.]/g, '');
						if (raw && !isNaN(parseFloat(raw))) {
							numEl.classList.add('is-counting');
							animateCounter(numEl);
						}
					});
					counterObserver.unobserve(entry.target);
				}
			});
		}, { threshold: 0.25 });

		document.querySelectorAll('.fp-stats-strip, .fp-impact-section').forEach(function (el) {
			counterObserver.observe(el);
		});

	}); // end DOMContentLoaded
})();
