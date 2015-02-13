<?php

class SRPW_AJAX {

	public static function init() {
		add_action( 'wp_ajax_srpw_post_type_selected', array( __CLASS__, 'select_taxonomy_callback' ) );
		add_action( 'wp_ajax_srpw_taxonomy_selected', array( __CLASS__, 'select_term_callback' ) );
	}

	public static function select_taxonomy_callback() {
		$nonce = $_POST['srpwNonce'];
		if ( ! wp_verify_nonce( $nonce, 'nonce_spw' ) ) {
			die;
		}
		$post_type = $_POST['postType'];
		$output    = SRPW_Helper::get_taxonomies( $post_type );
		echo $output;
		die;
	}

	public static function select_term_callback() {
		$nonce = $_POST['srpwNonce'];
		if ( ! wp_verify_nonce( $nonce, 'nonce_spw' ) ) {
			die;
		}
		$taxonomy = $_POST['taxonomy'];
		$output   = SRPW_Helper::get_terms( $taxonomy );
		echo $output;
		die;
	}


}


SRPW_AJAX::init();