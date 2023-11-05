/**
*
* --------------------------------------------------------------------
*
* Template : neoton - Modern Business and Corporate WordPress Theme
* Author : backtheme
* Author URI : https://backtheme.tech/
*
* --------------------------------------------------------------------
*
**/

(function($) {
	var bodyEl = document.body,
		offwrapcon = document.querySelector( '.offwrap' ),
		closebtn = document.getElementById( 'close-button22' ),
		isOpen = false;

	function init() {
		initEvents();
	}

	function initEvents($) {
		if (jQuery('#open-button22').length) {
			openbtn = document.getElementById( 'open-button22' );
			openbtn.addEventListener( 'click', toggleMenu );
		}
		if( closebtn ) {
			closebtn.addEventListener( 'click', toggleMenu );
		}

		// close the menu element if the target it´s not the menu element or one of its descendants..
		offwrapcon.addEventListener( 'click', function(ev) {
			var target = ev.target;
			if( isOpen && target !== openbtn ) {
				toggleMenu();
			}
		} );
	}

	function toggleMenu($) {
		if( isOpen ) {
			classie.remove( bodyEl, 'show-offcan' );
		}
		else {
			classie.add( bodyEl, 'show-offcan' );
		}
		isOpen = !isOpen;
	}
	init();
})();