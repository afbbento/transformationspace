<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage transformationspace
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, user-scalable=no" />
<?php wp_head(); ?>

<script>
      window.GLOBAL_URL = "<?php bloginfo('template_url');?>";
</script>
	
</head>



<body <?php body_class(); ?> onload="init()">
	
	<?php 
		if (is_404()){
		//	get_template_part( 'template-parts/navigation/navigation', '404' ); 	
		}else{
			get_template_part( 'template-parts/header/site', 'loading' ); 
			get_template_part( 'template-parts/navigation/navigation', 'top' ); 
			
		}

	?>
	
	
