<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

if ( ! $short_description ) {
	return;
}

?>
<div class="woocommerce-product-details__short-description">

	<?php
	
global $product;

$id = $product->get_id();
$terms = get_the_terms( $product->get_id(), 'product_cat' );

	foreach ($terms as $term) {
		$category = $term->name;
		break;
	}
// if($id == 2533) {
	
// }
if ($category == "Collier de prise en charge") :
?>
	<h2>Dimensions du collier :</h2>
	<div class="information_collier">
		<!-- D X RP -->
		<div class="dxRp col_info">
			<div class="collier_head">
				<p><strong>d x Rp</strong></p>
			</div>
			<div class="collier_body body_dxRp">
				<p><?php echo the_field('d_x_rp'); ?></p>
			</div>
		</div>
		<!-- H -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>H</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('h'); ?></p>
			</div>
		</div>
		<!-- A -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>A</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('a'); ?></p>
			</div>
		</div>
		<!-- L -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>L</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('l'); ?></p>
			</div>
		</div>
		<!-- B -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>B</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('b'); ?></p>
			</div>
		</div>
		<!-- Nb Boulons -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>Nb Boulons</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('nb_boulons'); ?></p>
			</div>
		</div>
		<!-- Poids -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>Poids(Kg)</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('poids'); ?></p>
			</div>
		</div>
		<!-- PN A 20 DEGRES -->
		<div class="col_info">
			<div class="collier_head">
				<p><strong>Pn à 20°C</strong></p>
			</div>
			<div class="collier_body">
				<p><?php echo the_field('pn_a_20'); ?></p>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php echo $short_description; // WPCS: XSS ok. ?>


</div>
