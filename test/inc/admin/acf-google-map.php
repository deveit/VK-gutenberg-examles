<?php

add_action(
	'acf/init',
	function () {
		if ( get_field( 'option-cmc__google-map-key', 'option' ) ) {
			acf_update_setting( 'google_api_key', get_field( 'option-cmc__google-map-key', 'option' ) );
		}
	}
);
