<?php 
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_58f73baf0512f',
			'title' => 'Cielo-Filial',
			'fields' => array (
				array (
					'key' => 'field_58f73bbb7d5bd',
					'label' => 'merchantId',
					'name' => 'cielo-filial-merchantid',
					'type' => 'text',
					'instructions' => 'identificador único da loja fornecido pela Cielo após a afiliação da loja.',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '00000000-0000-0000-0000-000000000000',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58f73eb943925',
					'label' => 'Modo API',
					'name' => 'cielo-filial-api',
					'type' => 'true_false',
					'instructions' => 'Caso esteja utilizando o modo API, você poderá parametrizar opções avançadas. (Não funciona em modo Checkout)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => 'Estou utilizando a API Cielo 3.0',
					'default_value' => 0,
					'ui' => 1,
					'ui_on_text' => '',
					'ui_off_text' => '',
				),
				array (
					'key' => 'field_58f73d6e43922',
					'label' => 'URL de Retorno',
					'name' => 'cielo-filial-return',
					'type' => 'url',
					'instructions' => 'Página web na qual o comprador será redirecionado ao fim da compra',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_58f73eb943925',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array (
					'key' => 'field_58f73de443923',
					'label' => 'URL de Notificação',
					'name' => 'cielo-filial-notification',
					'type' => 'url',
					'instructions' => 'Página web na qual o comprador será redirecionado ao fim da compra',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_58f73eb943925',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
				array (
					'key' => 'field_58f73e4b43924',
					'label' => 'URL de Mudança de Status',
					'name' => 'cielo-filial-status',
					'type' => 'url',
					'instructions' => 'Página web na qual o comprador será redirecionado ao fim da compra',
					'required' => 0,
					'conditional_logic' => array (
						array (
							array (
								'field' => 'field_58f73eb943925',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'taxonomy',
						'operator' => '==',
						'value' => 'cielo-filial',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => 1,
			'description' => '',
		));

		endif;