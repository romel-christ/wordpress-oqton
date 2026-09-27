/**
 * Animates numbers in elements with class "oq-counter-num" when they scroll into view.
 * The target number and suffix are read from the text, e.g. "250+" or "98%".
 */
( function () {
	const els = document.querySelectorAll( '.oq-counter-num' );
	if ( ! els.length || ! ( 'IntersectionObserver' in window ) ) {
		return;
	}
	if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	const animate = ( el ) => {
		const match = el.textContent.trim().match( /^(\d+)(.*)$/ );
		if ( ! match ) {
			return;
		}
		const target = parseInt( match[ 1 ], 10 );
		const suffix = match[ 2 ];
		const duration = 1600;
		const start = performance.now();

		const tick = ( now ) => {
			const progress = Math.min( ( now - start ) / duration, 1 );
			const eased = 1 - Math.pow( 1 - progress, 3 );
			el.textContent = Math.round( target * eased ) + suffix;
			if ( progress < 1 ) {
				requestAnimationFrame( tick );
			}
		};
		requestAnimationFrame( tick );
	};

	const observer = new IntersectionObserver(
		( entries ) => {
			entries.forEach( ( entry ) => {
				if ( entry.isIntersecting ) {
					animate( entry.target );
					observer.unobserve( entry.target );
				}
			} );
		},
		{ threshold: 0.4 }
	);

	els.forEach( ( el ) => observer.observe( el ) );
} )();
