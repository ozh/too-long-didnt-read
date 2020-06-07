<?php
/**
 * Plugin Name:       TL;DR
 * Plugin URI:        https://twitter.com/ozh/status/27858555260
 * GitHub Plugin URI: https://github.com/ozh/too-long-didnt-read
 * Description:       “Excerpt” 👉 “TL;DR”
 * Version:           1.0.2
 * Requires at least: 3.0
 * Requires PHP:      5.6
 * Author:            Ozh
 * Author URI:        http://ozh.org/
 */

function tl_dr() {
	the_excerpt();
}

function get_tl_dr() {
	return get_the_excerpt();
}

function tl_dr_filter( $translation, $text, $domain ) {
	switch( $text ) {
		case 'Excerpt':
			$translation = 'TL;DR';
			break;
		case 'Excerpts are optional hand-crafted summaries of your content that can be used in your theme. <a href="http://codex.wordpress.org/Excerpt" target="_blank">Learn more about manual excerpts.</a>':
			$translation = <<<TLDR
<a traget="_blank" href="http://en.wiktionary.org/wiki/TLDR">TL;DR</a> means 'Too Long, Didn't Read'. Nerds are busy people, they don't have time to read all your lengthy stuff. Tease them. Put here a short TLDR <a href="http://codex.wordpress.org/Excerpt" target="_blank">excerpt</a>, and if your theme does not support it yet, add &lt;?php tl_dr(); ?> in your archive pages.
TLDR;
			break;
	}
	return $translation;
}
add_filter( 'gettext', 'tl_dr_filter', 10, 3 );
