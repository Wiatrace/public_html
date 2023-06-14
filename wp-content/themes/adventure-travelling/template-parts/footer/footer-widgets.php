<?php
/**
 * Displays footer widgets if assigned
 *
 * @package Adventure Travelling
 * @subpackage adventure_travelling
 */

?>
<div class="container">
	<aside class="widget-area row" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'adventure-travelling' ); ?>">
		<div class="col-md-3">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
		<div class="col-xl-9">
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	</aside>
</div>