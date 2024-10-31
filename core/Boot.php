<?php

	# Require Files
	require_once(__DIR__ . '/Translate.php');
	require_once(__DIR__ . '/CoreCptTax.php');
	require_once(__DIR__ . '/WordpressExtended.php');
	require_once(__DIR__ . '/CheckRequeriments.php');
	require_once(__DIR__ . '/SdkCieloCheckout.php');

	class Boot{

		private 
			$Translate,
			$checkRequeriments,
			$sdkCieloCheckout;

		public function __construct(){
			$this->Translate = new translate();
			$this->checkRequeriments = new CheckRequeriments();
			$this->sdkCieloCheckout = new SdkCieloCheckout();


			#actions
			add_action('init', ['WordpressExtended', 'postType']);
		}
	}