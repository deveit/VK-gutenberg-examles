<?php

/**
 * Format phone number, trim all unnecessary characters
 *
 * @param string $phone Phone number
 *
 * @return string Formatted phone number
 */
function preparePhone( $phone ) {
	return preg_replace( '/[^+\d]+/', '', $phone );
}