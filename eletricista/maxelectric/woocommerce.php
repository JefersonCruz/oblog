<?php
/**
* The Template for displaying all single posts
*
* @package WordPress
* @subpackage Maxelectric
* @since Maxelectric 1.0
*/
get_header(); ?>

<?php get_template_part("template-parts/shop","before"); ?>

<?php woocommerce_content(); ?>

<?php get_template_part("template-parts/shop","after"); ?>