<?php 
	class SdkCieloCheckout{
		private static
			$setId,
			$setSubsidiaries,
			$cartOrder,
			$merchantId,
			$endpoint = 'https://cieloecommerce.cielo.com.br/api/public/v1/';

		/**
		* Process Cielo Checkout - Ajax
		*/
		public function ajaxCieloCheckout(){

			$tempResult = [
				'status' => false,
				'msg' => 'Falha ao validar o token, tente novamente.',
				'data' => []
			];

			//check security
			if(!wp_verify_nonce($_POST['nonce'], 'cielo-checkout-oll')){
				self::printOutput($tempResult);
			}

			#Check Post ID
			$id = (int)$_POST['id'];
			$post = get_post($id);
			if(!$post || $post->post_status != 'publish' || $post->post_type != 'cielo-payment'){
				$error = $tempResult;
				$error['msg'] = "Não há objeto de pagamento com o identificador informado ({$id}) ou ele pode não ter sido publicado.";
				$error['data'] = $post;
				self::printOutput($error);
			}
			self::$setId = $id;

			$subSidiaries = self::checkSubsidiaries();
			self::processCart();

			$body = wp_remote_post( self::$endpoint . 'orders', [
				'timeout' => 60,
				'headers' => [
					'MerchantId' => self::$merchantId,
					'Content-type' => 'application/json'
				],
				'body' => json_encode(self::$cartOrder)
			]);

			$data = json_decode(wp_remote_retrieve_body($body));

			$result = $tempResult;
			$result['status'] = true;
			$result['msg'] = 'Checkout Processado com Sucesso.';
			$result['data'] = $data;
			$result['body'] = $body;

			echo json_encode($result);exit;

		   	self::printOutput($result);
		}

		/**
		* Print output to AJAX
		**/
		public static function printOutput($data){
			echo json_encode($data);exit;
		}

		/**
		* Check and Set Subsidiaries
		**/
		public static function checkSubsidiaries(){
			$data = wp_get_post_terms(self::$setId, 'cielo-filial');
			$count = count($data);
			if($count == 1){
				$merchantId = get_field('cielo-filial-merchantid', "{$data[0]->taxonomy}_{$data[0]->term_id}");
				$name = str_replace(' ', '', $data[0]->name);
			}else if($count > 1){
				if(!self::$setSubsidiaries){
					$result['status'] = false;
					$result['msg'] = 'O objeto de pagamento possuí duas ou mais filiais vinculadas. É necessário especificar qual você deseja usar no momento da compra.';
					$result['data'] = $data;

					self::printOutput($result);
				}

				$checkExists = false;
				foreach ($$data as $tax){
					if($tax->term_id == self::$setSubsidiaries){
						$merchantId = get_field('cielo-filial-merchantid', "{$tax->taxonomy}_{$tax->term_id}");
						$name = str_replace(' ', '', $tax->name);
						$checkExists = true;
						break;
					}
				}


				if(!$checkExists){
					$result['status'] = false;
					$result['msg'] = 'A filial especificada não está relacionada ao objeto de pagamento. Verifique e tente novamente.';
					$result['data'] = $data;

					self::printOutput($result);
				}

			}else{
				$result['status'] = false;
				$result['msg'] = 'Vincule no mínimo uma filial ao objeto de pagamento.';
				$result['data'] = $data;

				self::printOutput($result);
			}

			self::$cartOrder  = new stdClass();
			self::$cartOrder->SoftDescriptor = substr($name, 0, 13);
			self::$merchantId = $merchantId;
		}

		/**
		* Process Cart to Payment
		**/
		public static function processCart(){
			self::$cartOrder->Cart = new stdClass();
			
			//Set Services / Products
			//Set Services / Products
			if(have_rows('cielo-items', self::$setId)){
				self::$cartOrder->Cart->Items = [];
				$i = 0;
				while(have_rows('cielo-items', self::$setId)){
					the_row();
					$price = get_sub_field('price') . '00';
					self::$cartOrder->Cart->Items[$i] = new stdClass();
					self::$cartOrder->Cart->Items[$i]->Name = get_sub_field('name');
					self::$cartOrder->Cart->Items[$i]->Description = get_sub_field('description');
					self::$cartOrder->Cart->Items[$i]->UnitPrice = (int)$price;
					self::$cartOrder->Cart->Items[$i]->Quantity = get_sub_field('quantity');
					self::$cartOrder->Cart->Items[$i]->Type = 'Service';
					self::$cartOrder->Cart->Items[$i]->Sku = get_sub_field('sku');
					$i++;
				}
			}

			//Set Shipping
			self::$cartOrder->Shipping = new stdClass();
			self::$cartOrder->Shipping->Type = 'WithoutShipping';
		}
	}