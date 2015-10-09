<?php get_header(); ?>

<?php get_template_part( 'framework/inc/titlebar' ); ?>

<div id="page-wrap" class="container">

	<div id="content" class="sidebar-right twelve columns">
	<?php woocommerce_content(); ?>
	</div> <!-- end content -->

	<div id="sidebar" class="four columns">

    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Shop Widgets') );?>

	</div>
	
</div> <!-- end page-wrap -->
	
<?php get_footer(); ?>
