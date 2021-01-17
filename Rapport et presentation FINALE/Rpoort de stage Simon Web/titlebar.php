<?php global $minti_data; ?>

<?php if (is_object($post) && !is_archive() && !is_search() && !is_404() && !is_author() && !is_home()) { ?>

	<?php if (rwmb_meta('minti_titlebar') != 'default' && rwmb_meta('minti_titlebar') != '') { ?>

		<?php if (rwmb_meta('minti_titlebar') == 'title') { ?>

			<div id="fulltitle" class="titlebar">
				<div class="container">
					<div id="title" class="ten columns">
						<?php if (!is_single()) { ?><h1><?php the_title(); ?></h1><?php } else { ?> <div class="title-h1"><?php the_title(); ?></div> <?php } ?>
					</div>
					<div id="breadcrumbs" class="six columns">
						<?php if ($minti_data['titlebar_breadcrumbs'] == 1) {
							minti_breadcrumbs();
						} ?>
					</div>
				</div>
			</div>

			<?php /* ---------------------------------------------------------------------------------------*/ ?>

		<?php } elseif (rwmb_meta('minti_titlebar') == 'featuredimagecenter') { ?>

			<div id="fullimagecenter" class="titlebar" style="background-image: url( <?php $images = rwmb_meta('minti_headerimage', 'type=image_advanced&size=standard');
																						if (is_array($images)) {
																							foreach ($images as $image) {
																								echo esc_url($image['url']);
																							}
																						} ?> );">
				<div class="container">
					<div class="sixteen columns">
						<?php if (!is_single()) { ?><h1><?php the_title(); ?></h1><?php } else { ?> <div class="title-h1"><?php the_title(); ?></div> <?php } ?>
					</div>
				</div>
			</div>

			<?php /* ---------------------------------------------------------------------------------------*/ ?>

		<?php } elseif (rwmb_meta('minti_titlebar') == 'transparentimage') { ?>

			<div id="transparentimage" class="titlebar" style="background-image: url( <?php $images = rwmb_meta('minti_headerimage', 'type=image_advanced&size=standard');
																						if (is_array($images)) {
																							foreach ($images as $image) {
																								echo esc_url($image['url']);
																							}
																						} ?> );">
				<div class="container">
					<div class="sixteen columns">
						<?php if (!is_single()) { ?><h1><?php the_title(); ?></h1><?php } else { ?> <div class="title-h1"><?php the_title(); ?></div> <?php } ?>
					</div>
				</div>
			</div>

			<?php /* ---------------------------------------------------------------------------------------*/ ?>

		<?php } elseif (rwmb_meta('minti_titlebar') == 'notitle') { ?>

			<div id="notitlebar"></div>

		<?php } ?>

	<?php } else { ?>

		<?php
		// Define the Title for different Pages
		if (is_home()) {
			$title = 'Blog';
		} elseif (is_search()) {
			$allsearch = new WP_Query("s=$s&showposts=-1");
			$count = $allsearch->post_count;
			wp_reset_postdata();
			$title = $count . ' ';
			$title .= __('Search results for:', 'unicon');
			$title .= ' ' . get_search_query();
		} elseif (class_exists('Woocommerce') && is_woocommerce()) {
			$title = $minti_data['text_titlebar_woocommerce'];
		} elseif (is_archive()) {
			if (is_category()) {
				$title = single_cat_title('', false);
			} elseif (is_tag()) {
				$title = __('Posts Tagged:', 'unicon') . ' ' . single_tag_title('', false);
			} elseif (is_day()) {
				$title = __('Archive for', 'unicon') . ' ' . get_the_time('F jS, Y');
			} elseif (is_month()) {
				$title = __('Archive for', 'unicon') . ' ' . get_the_time('F Y');
			} elseif (is_year()) {
				$title = __('Archive for', 'unicon') . ' ' . get_the_time('Y');
			} elseif (is_author()) {
				$title = __('Author Archive for', 'unicon') . ' ' . get_the_author();
			} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
				$title = __('Blog Archives', 'unicon');
			} else {
				$title = single_term_title("", false);
				if ($title == '') { // Fix for templates that are archives
					$post_id = $post->ID;
					$title = get_the_title($post_id);
				}
			}
		} elseif (is_404()) {
			$title = __('Oops, this Page could not be found.', 'unicon');
		} elseif (get_post_type() == 'post') {
			$title = $minti_data['text_titlebar_blog'];
		} else {
			$title = get_the_title();
		}
		?>

		<?php if ($minti_data['titlebar_layout'] == 'title') { ?>
			<div id="fulltitle" class="titlebar">
				<div class="container">
					<div id="title" class="ten columns">
						<?php if (!is_single()) { ?><h1><?php echo esc_html($title); ?></h1><?php } else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div> <?php } ?>
					</div>
					<div id="breadcrumbs" class="six columns">
						<?php if ($minti_data['titlebar_breadcrumbs'] == 1) {
							minti_breadcrumbs();
						} ?>
					</div>
				</div>
			</div>
		<?php } elseif ($minti_data['titlebar_layout'] == 'featuredimagecenter') { ?>
			<div id="fullimagecenter" class="titlebar" style="background-image: url( <?php echo esc_url($minti_data['titlebar_image']['url']); ?> );">
				<div id="fullimagecentertitle">
					<div class="container">
						<div class="sixteen columns">
							<?php if (!is_single()) { ?><h1><?php echo esc_html($title); ?></h1><?php } else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div> <?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($minti_data['titlebar_layout'] == 'transparentimage') { ?>

		<?php
		if (is_product()) {
			$brands = wp_get_object_terms( get_the_ID(), 'pwb-brand', array( 'fields' => 'names' ) );
				foreach( $brands as $brand ){
				 if ($brand == 'HTH'){
				 	$banner = "https://www.delattredistribution.com/wp-content/uploads/2020/11/hth-bandeau-r-1.jpg";
				 }
			}
		}
		if(empty($banner)) $banner = $minti_data['titlebar_image']['url'];
		?>

		
			<div id="transparentimage" class="titlebar" style="background-image: url( <?php echo esc_url($banner); ?> );">
				<div class="titlebar-overlay"></div>
				<div class="container">
					<div class="sixteen columns">
						<?php if (!is_single()) { ?><h1><?php echo esc_html($title); ?></h1><?php } else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div> <?php } ?>
					</div>
				</div>
			</div>
		<?php } elseif ($minti_data['titlebar_layout'] == 'notitle') { ?>
			<div id="notitlebar"></div>
		<?php } ?>

	<?php } // End Else 
	?>

<?php } else { // If no post page 
?>

	<?php
	// Define the Title for different Pages
	if (is_home()) {
		$title = 'Blog';
	} elseif (is_search()) {
		$allsearch = new WP_Query("s=$s&showposts=-1");
		$count = $allsearch->post_count;
		wp_reset_postdata();
		$title = $count . ' ';
		$title .= __('Search results for:', 'unicon');
		$title .= ' ' . get_search_query();
	} elseif (class_exists('Woocommerce') && is_woocommerce()) {
		$title = $minti_data['text_titlebar_woocommerce'];
	} elseif (is_archive()) {
		if (is_category()) {
			$title = single_cat_title('', false);
		} elseif (is_tag()) {
			$title = __('Posts Tagged:', 'unicon') . ' ' . single_tag_title('', false);
		} elseif (is_day()) {
			$title = __('Archive for', 'unicon') . ' ' . get_the_time('F jS, Y');
		} elseif (is_month()) {
			$title = __('Archive for', 'unicon') . ' ' . get_the_time('F Y');
		} elseif (is_year()) {
			$title = __('Archive for', 'unicon') . ' ' . get_the_time('Y');
		} elseif (is_author()) {
			$title = __('Author Archive for', 'unicon') . ' ' . get_the_author();
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			$title = __('Blog Archives', 'unicon');
		} else {
			$title = single_term_title("", false);
			if ($title == '') { // Fix for templates that are archives
				$post_id = $post->ID;
				$title = get_the_title($post_id);
			}
		}
	} elseif (is_404()) {
		$title = __('Oops, this Page could not be found.', 'unicon');
	} elseif (get_post_type() == 'post') {
		$title = $minti_data['text_titlebar_blog'];
	} else {
		$title = get_the_title();
	}
	?>

	<?php if ($minti_data['titlebar_layout'] == 'title') { ?>
		<div id="fulltitle" class="titlebar">
			<div class="container">
				<div id="title" class="ten columns">
					<?php if (!is_single()) { ?><h1><?php echo esc_html($title); ?></h1><?php } else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div> <?php } ?>
				</div>
				<div id="breadcrumbs" class="six columns">
					<?php if ($minti_data['titlebar_breadcrumbs'] == 1) {
						minti_breadcrumbs();
					} ?>
				</div>
			</div>
		</div>
	<?php } elseif ($minti_data['titlebar_layout'] == 'featuredimagecenter') { ?>
		<div id="fullimagecenter" class="titlebar" style="background-image: url( <?php echo esc_url($minti_data['titlebar_image']['url']); ?> );">
			<div id="fullimagecentertitle">
				<div class="container">
					<div class="sixteen columns">
						<?php if (!is_single()) { ?><h1><?php echo esc_html($title); ?></h1><?php } else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div> <?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } elseif ($minti_data['titlebar_layout'] == 'transparentimage') { ?>
		<div id="transparentimage" class="titlebar" style="background-image: url( <?php echo esc_url($minti_data['titlebar_image']['url']); ?> );">
			<div class="titlebar-overlay"></div>
			<div class="container">
				<div class="sixteen columns">
					<?php

					/*
						 if(strpos($_SERVER['REQUEST_URI'], 'shop') !== false){?> <h1>Nos produits en vente</h1> <?php }
						 elseif(strpos($_SERVER['REQUEST_URI'], 'hayward') !== false){?><h1>Nos produits de la marque Hayward</h1><?php }
						 elseif(strpos($_SERVER['REQUEST_URI'], 'toro') !== false){?><h1>Nos produits de la marque Toro</h1><?php }
						 elseif(strpos($_SERVER['REQUEST_URI'], 'ccei') !== false){?><h1>Nos produits de la marque CCEI</h1><?php }
						elseif(strpos($_SERVER['REQUEST_URI'], 'claber') !== false){?><h1>Nos produits de la marque Claber</h1><?php } 
						elseif(strpos($_SERVER['REQUEST_URI'], 'categorie-produit') !== false && strpos($_SERVER['REQUEST_URI'], 'piscine') !== false){?><h1>Nos produits de piscine</h1><?php }
						elseif(strpos($_SERVER['REQUEST_URI'], 'categorie-produit') !== false && strpos($_SERVER['REQUEST_URI'], 'arrosage') !== false){?><h1>Nos produits d'arrosage</h1><?php }
*/

					$voyelle = array('A', 'E', 'I', 'O', 'U', 'Y', 'a', 'e', 'i', 'o', 'u', 'y');
					// On créé un tableau avec les voyelles
					if (is_tax('pwb-brand')) {
						$current_brand = get_queried_object();
						echo '<h1>Nos produits de la marque ' . $current_brand->name . '</h1>';
					} elseif (is_tax('product_cat')) {
						$current_category = get_queried_object();
						 if($current_category->name == 'Produit d\'entretien'){
							echo '<h1> Nos produits d\'entretien piscine </h1>';
						}
						// Si la première lettre du nom de current category ne contient pas de voyelle

						elseif(!in_array($current_category->name{0}, $voyelle)) {
							echo '<h1> Nos produits de ' . $current_category->name . '</h1>';
	
						
						// Si la première lettre du nom de current category contient une voyelle

						} elseif (in_array($current_category->name{0}, $voyelle)) {
							echo '<h1> Nos produits d\' ' . $current_category->name . '</h1>';
						} 
					} elseif (is_post_type_archive('product')) {
						echo '<h1>Nos produits en vente</h1>';
					} else { ?> <div class="title-h1"><?php echo esc_html($title); ?></div>

					<?php } ?>

				</div>
			</div>
		</div>
	<?php } elseif ($minti_data['titlebar_layout'] == 'notitle') { ?>
		<div id="notitlebar"></div>
	<?php } ?>

<?php } // End Else 
?>