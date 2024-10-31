<?php
	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array (
			'key' => 'group_58f740093c636',
			'title' => 'Cielo',
			'fields' => array (
				array (
					'key' => 'field_58f74049c06e4',
					'label' => 'Produtos / Serviços',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_58f740fcc06e7',
					'label' => 'Lista',
					'name' => 'cielo-items',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => 'field_58f74122c06e8',
					'min' => 0,
					'max' => 0,
					'layout' => 'row',
					'button_label' => 'Adicionar',
					'sub_fields' => array (
						array (
							'key' => 'field_58f74122c06e8',
							'label' => 'Nome',
							'name' => 'name',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => 128,
						),
						array (
							'key' => 'field_58f74283c06ec',
							'label' => 'Tipo',
							'name' => 'tipo',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array (
							'key' => 'field_58f74142c06e9',
							'label' => 'Descrição',
							'name' => 'description',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => 256,
						),
						array (
							'key' => 'field_58f741f1c06ea',
							'label' => 'Preço',
							'name' => 'price',
							'type' => 'number',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => 'R$',
							'append' => ',00',
							'min' => 1,
							'max' => '',
							'step' => '',
						),
						array (
							'key' => 'field_58f7424fc06eb',
							'label' => 'Quantidade',
							'name' => 'quantity',
							'type' => 'number',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => 1,
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'min' => 1,
							'max' => 1000,
							'step' => '',
						),
						array (
							'key' => 'field_58f74310c06ed',
							'label' => 'SKU',
							'name' => 'sku',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
				),
				array (
					'key' => 'field_58f74014c06e3',
					'label' => 'Descontos',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_590746bab6ac3',
					'label' => 'Versão PRO',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => Translate::trans('required.pro'),
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
				array (
					'key' => 'field_58f74069c06e6',
					'label' => 'Configurações',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_590746bab6ac5',
					'label' => 'Versão PRO',
					'name' => '',
					'type' => 'message',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => Translate::trans('required.pro'),
					'new_lines' => 'wpautop',
					'esc_html' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'cielo-payment',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'discussion',
				4 => 'comments',
				5 => 'slug',
				6 => 'author',
				7 => 'format',
				8 => 'page_attributes',
				9 => 'featured_image',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
			'active' => 1,
			'description' => '',
		));

	endif;