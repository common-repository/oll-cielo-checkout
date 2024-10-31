<?php
/**
* Development By Raphael Nikson (c) 2014
*/

if(!class_exists('ollCoreCptTax')) {
	class ollCoreCptTax{

		//POST TYPE
		public function cpt($name, $label, $type, $slug, $hierachical, $suports, $icon='dashicons-admin-post'){
			$labels = array(
				'name'                  => $label,
				'singular_name'         => $label,
				'menu_name'             => $label,
				'all_items'             => 'Ver tudo',
				'view_item'             => 'Ver Detalhes',
				'add_new_item'          => 'Adicionar',
				'add_new'               => 'Adicionar',
				'edit_item'             => 'Editar '.$label,
				'update_item'           => 'Atualizar '.$label,
				'not_found_in_trash'    => 'Não há itens na lixeira',
			);

			$args = array(
				'label'                 => $label,
				'labels'                => $labels,
				'supports'              => $suports,
				'hierarchical'          => $hierachical,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'show_in_nav_menus'     => true,
				'show_in_admin_bar'     => true,
				'menu_position'         => 5,
				'can_export'            => true,
				'has_archive'           => true,
				'rewrite'               => array('slug' => $slug),
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => $type,
				'menu_icon'             => $icon,
				);
			register_post_type($name, $args);
		}


		///TAXONOMIES
		public function tax($tax, $labelsingular, $label, $cpts, $showAdmin, $slug, $showMenu){

			$labels = array(
				'name'                       => $label,
				'singular_name'              => $labelsingular,
				'menu_name'                  => $label,
				);

			$rewrite = array(
				'slug'                       => $slug,
				'with_front'                 => false,
				'hierarchical'               => true,
				);

			$args = array(
				'labels'                     => $labels,
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => $showAdmin,
				'show_in_nav_menus'          => true,
				'show_in_menu'          	 => $showMenu,
				'show_tagcloud'              => true,
				);

			register_taxonomy( $tax, $cpts, $args );
		}

		//SPECIAL NO CHARS
		public function clearChar($string, $space = true) {
			$what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );

			$by  = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

			if($space){
				return str_replace($what, $by, $string);
			}
			else{
				return str_replace($what, $by, str_replace(" ", "-", $string));
			}
		}
	}
}


