(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', function () {

		/* Mobile nav toggle */
		var toggle = document.getElementById('menu-toggle');
		var nav = document.getElementById('main-navigation');
		if (toggle && nav) {
			toggle.addEventListener('click', function () {
				var isOpen = nav.classList.toggle('is-open');
				toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
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
					nav.classList.remove('is-open');
					if (toggle) toggle.setAttribute('aria-expanded', 'false');
				});
			});
		}

		/* Highlight the nav item that matches the section currently in view. */
		if (nav) {
			var navItems = nav.querySelectorAll('.nav-menu li');
			var sectionLinks = [];
			var header = document.getElementById('site-header');

			nav.querySelectorAll('.nav-menu a[href*="#"]').forEach(function (link) {
				var hash = link.getAttribute('href').split('#')[1];
				var section = hash ? document.getElementById(hash) : null;
				if (section) {
					sectionLinks.push({ link: link, section: section });
				}
			});

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
				} else {
					var homeLink = nav.querySelector('.nav-menu a[href$="/"]');
					if (homeLink) homeLink.parentElement.classList.add('current-menu-item');
				}
			}

			window.addEventListener('scroll', setActiveNavItem, { passive: true });
			window.addEventListener('hashchange', setActiveNavItem);
			setActiveNavItem();
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
	});
})();
