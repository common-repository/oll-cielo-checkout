<?php
	class CheckRequeriments{

		/**
		* Boot Function
		**/
		public function __construct(){
			$this->checkAcf();
			if($_GET['post_type'] == 'cielo-payment'){
				WordpressExtended::showAdminNotice(WordpressExtended::$typeUpdatedNag, Translate::trans('required.pro'));
			}
			
			add_action('wp_ajax_process_cielo_checkout', [ 'SdkCieloCheckout', 'ajaxCieloCheckout'] );
			add_action('wp_ajax_nopriv_process_cielo_checkout', [ 'SdkCieloCheckout', 'ajaxCieloCheckout']);
			add_action('init', [ __CLASS__, 'loadAjaxPlugin'] );
		}

		/**
		* Check ACF
		**/
		private function checkAcf(){
			if(!class_exists('acf')){
				WordpressExtended::showAdminNotice(WordpressExtended::$typeError, Translate::trans('required.acf'));
			}else{
				$this->registerAcfCieloFilial();
				$this->registerAcfCieloCart();
			}
		}

		/**
		* Register ACF Group - Reference Cielo Filial
		**/
		private function registerAcfCieloFilial(){
			require_once( __DIR__ . '/inc/acf-cielo-filial.php');
		}

		/**
		* Register ACF Group - Reference Cielo Cart
		**/
		private function registerAcfCieloCart(){
			require_once( __DIR__ . '/inc/acf-cielo-cart.php');
		}

		/**
		* ShortCode Plugin
		**/
		public function shortCode($attr){
			$attributes = shortcode_atts([
					'class' => 'btn btn-success',
					'label' => 'Pagar Agora',
					'id' => null,
					'color' => null,
				], $attr);


			require_once( __DIR__ . '/inc/shortCode.php');

			echo $html;
		}


		/**
		* Load Ajax Plugin Settings
		**/
		public function loadAjaxPlugin() {
			#Setting Plugin
			$paramsLocalize = [
				'ajax_url' => admin_url( 'admin-ajax.php'),
				'ajax_nonce' => wp_create_nonce('cielo-checkout-oll')
			];

			#Register Script And Load
	    	wp_register_script('process_cielo_checkout', WP_PLUGIN_URL . '/cielo-checkout-oll/assets/js/cielo-checkout.js', ['jquery']);
		    wp_localize_script('process_cielo_checkout', 'cieloOll', $paramsLocalize);      
		    wp_enqueue_script( 'jquery' );
		    wp_enqueue_script( 'process_cielo_checkout' );


		    #Only Load
		    wp_enqueue_script( 'animatedModal', WP_PLUGIN_URL . '/cielo-checkout-oll/assets/js/animatedModal/js/animatedModal.min.js');
		    wp_enqueue_style( 'animatedModal', WP_PLUGIN_URL . '/cielo-checkout-oll/assets/js/animatedModal/css/animate.min.css');

		    add_shortcode( 'cielo-checkout-oll', [ __CLASS__, 'shortCode'] );

		}

	}