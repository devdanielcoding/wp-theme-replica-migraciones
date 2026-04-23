(function () {
	'use strict';

	var clamp = function (value, min, max) {
		return Math.min(Math.max(value, min), max);
	};

	var parallaxSections = Array.prototype.slice.call(
		document.querySelectorAll('[data-behavior="parallax-sticky"]')
	);

	if (!parallaxSections.length) {
		return;
	}

	var isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	if (isReducedMotion) {
		document.documentElement.classList.add('reduced-motion');
		return;
	}

	var ticking = false;

	var updateSection = function (section) {
		var rect = section.getBoundingClientRect();
		var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
		var progress = clamp((viewportHeight - rect.top) / (rect.height + viewportHeight), 0, 1);
		var media = section.querySelector('.parallax-media');
		var overlay = section.querySelector('.parallax-overlay');
		var copy = section.querySelector('.parallax-copy');
		var scale = 1 - progress * 0.15;
		var y = 250 - progress * 500;
		var copyOpacity = 0;

		if (progress >= 0.25 && progress < 0.5) {
			copyOpacity = (progress - 0.25) / 0.25;
		} else if (progress >= 0.5 && progress < 0.75) {
			copyOpacity = 1 - (progress - 0.5) / 0.25;
		}

		if (media) {
			media.style.transform = 'scale(' + scale.toFixed(3) + ')';
		}

		if (overlay) {
			overlay.style.opacity = String(1 - progress);
		}

		if (copy) {
			copy.style.transform = 'translate3d(0, ' + y.toFixed(1) + 'px, 0)';
			copy.style.opacity = copyOpacity.toFixed(3);
		}
	};

	var update = function () {
		parallaxSections.forEach(updateSection);
		ticking = false;
	};

	var requestTick = function () {
		if (!ticking) {
			window.requestAnimationFrame(update);
			ticking = true;
		}
	};

	window.addEventListener('scroll', requestTick, { passive: true });
	window.addEventListener('resize', requestTick);
	requestTick();
})();
