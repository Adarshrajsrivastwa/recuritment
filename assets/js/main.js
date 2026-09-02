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
