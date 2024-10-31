<?php 
	class WordpressExtended{
		private static
			$noticeType,
			$noticeMessage;
		public static 
			$typeError = 'error',
			$typeUpdated = 'updated',
			$typeUpdatedNag = 'updated-nag';
		/**
		* Show Message With Admin Notice
		* @param Type String (updated, {error}, update-nag)
		**/
		public static function showAdminNotice($type, $message){

			self::$noticeType = $type;
			self::$noticeMessage = $message;

			add_action( 'admin_notices', [ __CLASS__, 'showAdminNoticeRender'] );
		}

		public static function showAdminNoticeRender(){
			$title = 'OLL Cielo Checkout: ';
			$type = self::$noticeType;
			$message = self::$noticeMessage;

			echo "<div class='{$type} notice'><p><b>{$title}</b>{$message}</p></div>";
		}

		// Register Custom Post Type
		public static function postType() {

			$cptTax = new OllCoreCptTax();
			$cptTax->cpt('cielo-payment', 'Cielo', 'page', 'cielo', true, ['title', 'revisions'], 'dashicons-share-alt');
			//$tax, $labelsingular, $label, $cpts, $showAdmin, $slug, $showMenu){
			$cptTax->tax('cielo-filial', 'Filial', 'Filiais', 'cielo-payment', false, 'cielo-filiais', true);

		}
	}