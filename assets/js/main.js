(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* Mobile nav toggle */
		var toggle = document.getElementById('menu-toggle');
		var nav = document.getElementById('main-navigation');
		var body = document.body;

		function setMobileNavState(isOpen) {
			if (!nav || !toggle) return;
			nav.classList.toggle('is-open', isOpen);
			body.classList.toggle('nav-open', isOpen);
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		}

		function closeMobileNav() {
			setMobileNavState(false);
		}

		if (toggle && nav) {
			toggle.addEventListener('click', function () {
				setMobileNavState(!nav.classList.contains('is-open'));
			});

			document.addEventListener('keydown', function (event) {
				if (event.key === 'Escape') {
					closeMobileNav();
				}
			});

			window.addEventListener('resize', function () {
				if (window.innerWidth > 782) {
					closeMobileNav();
				}
			});
		}

		/* FAQ accordion */
		var faqButtons = document.querySelectorAll('.faq-question');
		faqButtons.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var item = btn.closest('.faq-item');
				var answer = item.querySelector('.faq-answer');
				var isOpen = btn.getAttribute('aria-expanded') === 'true';

				/* close others */
				faqButtons.forEach(function (other) {
					if (other !== btn) {
						other.setAttribute('aria-expanded', 'false');
						var otherAnswer = other.closest('.faq-item').querySelector('.faq-answer');
						otherAnswer.style.maxHeight = null;
					}
				});

				btn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
				answer.style.maxHeight = isOpen ? null : answer.scrollHeight + 'px';
			});
		});

		/* Close mobile menu on link click */
		if (nav) {
			nav.querySelectorAll('a').forEach(function (link) {
				link.addEventListener('click', function () {
					closeMobileNav();
				});
			});
		}

		/* One-page section highlighting only when nav uses in-page hash links. */
		if (nav) {
			var navItems = nav.querySelectorAll('.nav-menu li');
			var sectionLinks = [];
			var header = document.getElementById('site-header');

			nav.querySelectorAll('.nav-menu a[href*="#"]').forEach(function (link) {
				var href = link.getAttribute('href') || '';
				var hash = href.split('#')[1];
				var section = hash ? document.getElementById(hash) : null;
				if (section) {
					sectionLinks.push({ link: link, section: section });
				}
			});

			if (sectionLinks.length) {
				function setActiveNavItem() {
					var headerHeight = header ? header.offsetHeight : 0;
					var activeLink = null;
					var activePosition = -Infinity;

					sectionLinks.forEach(function (item) {
						var sectionPosition = item.section.getBoundingClientRect().top;
						if (sectionPosition <= headerHeight + 24 && sectionPosition > activePosition) {
							activeLink = item.link;
							activePosition = sectionPosition;
						}
					});

					navItems.forEach(function (item) {
						item.classList.remove('current-menu-item');
					});

					if (activeLink) {
						activeLink.parentElement.classList.add('current-menu-item');
					}
				}

				window.addEventListener('scroll', setActiveNavItem, { passive: true });
				window.addEventListener('hashchange', setActiveNavItem);
				setActiveNavItem();
			}
		}

		/* Simple scroll-reveal for cards */
		var revealTargets = document.querySelectorAll('.focus-card, .service-card, .why-card, .testimonial-card, .blog-card, .journey-step');
		if ('IntersectionObserver' in window && revealTargets.length) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						entry.target.style.opacity = '1';
						entry.target.style.transform = 'translateY(0)';
						observer.unobserve(entry.target);
					}
				});
			}, { threshold: 0.15 });

			revealTargets.forEach(function (el) {
				el.style.opacity = '0';
				el.style.transform = 'translateY(16px)';
				el.style.transition = 'opacity .5s ease, transform .5s ease';
				observer.observe(el);
			});
		}

		/* Candidate Form Notice Period & File Input Preview handlers */
		var noticeRadios = document.querySelectorAll('.toggle-notice-doc');
		var noticeDocBox = document.getElementById('notice_doc_container');
		var noticeFileInput = document.getElementById('notice_doc');

		if (noticeRadios.length && noticeDocBox) {
			function updateNoticeDocVisibility() {
				var selected = document.querySelector('input[name="serving_notice"]:checked');
				if (selected && selected.value === 'Yes') {
					noticeDocBox.classList.remove('hidden-field');
					noticeDocBox.style.display = 'block';
					if (noticeFileInput) noticeFileInput.setAttribute('required', 'required');
				} else {
					noticeDocBox.classList.add('hidden-field');
					noticeDocBox.style.display = 'none';
					if (noticeFileInput) noticeFileInput.removeAttribute('required');
				}
			}

			noticeRadios.forEach(function (radio) {
				radio.addEventListener('change', updateNoticeDocVisibility);
			});
			updateNoticeDocVisibility();
		}

		/* File preview updates */
		function bindFilePreview(inputId, previewId) {
			var fileInput = document.getElementById(inputId);
			var preview = document.getElementById(previewId);
			if (fileInput && preview) {
				fileInput.addEventListener('change', function () {
					if (fileInput.files && fileInput.files[0]) {
						var file = fileInput.files[0];
						var size = (file.size / (1024 * 1024)).toFixed(2);
						preview.textContent = 'Selected: ' + file.name + ' (' + size + ' MB)';
						preview.classList.add('has-file');
					} else {
						preview.textContent = '';
						preview.classList.remove('has-file');
					}
				});
			}
		}
		bindFilePreview('resume_file', 'resume_file_name');
		bindFilePreview('notice_doc', 'notice_doc_name');
	});
})();
