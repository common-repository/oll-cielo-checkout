<?php 

	class Translate{
		private static
			$fullDataTranslate = [

				// Português
				'pt_BR' => [
					'required' => [
						'acf' => 'O Plugin Advanced Custom Fields (ACF) é requerido.',
						'pro' => 'Adquira a versão Pro e desbloqueie serviços como: Desconto geral e/ou por metódo de pagamento, antifraude e pagamento recorrente. (<a href="http://orlandolacerda.com/plugins/cielo-checkout">Comprar</a>)'
					]
				],

				//ENGLISH
				'en' => [
					'required' => [
						'acf' => 'The plugin Advanced Custom Fields (ACF) is required.',
						'pro' => 'Get a version Pro and allow services has: Discount general and/or by payment method, anti-fraud and recurring payment. (<a href="http://orlandolacerda.com/plugins/cielo-checkout">Buy</a>)'
					]
				]
			];

		public static function trans($dotData){
			$data = explode('.', $dotData);

			$trans = self::$fullDataTranslate[apply_filters('cielo_oll_language', 'pt_BR')];
			foreach($data AS $key){
				$trans = $trans[$key];
			}

			return $trans;
		}
	}

