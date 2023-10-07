<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="site">
			<header class="header">
				<div class="container">
					<div class="header__content flex">
						<a href="/" class="header__logo">
							<img src="<?php echo get_field('logo', 'option'); ?>" alt="logo">
						</a>
						<nav class="header__menu">
							<ul class="flex">
								<li><a href="#about">О премии</a></li>
								<li><a href="#news">Новости</a></li>
								<li><a href="#gallery">Галерея</a></li>
								<li><a href="#partners">Партнеры</a></li>
								<li><a href="#footer">Контакты</a></li>
							</ul>
						</nav>
						<div class="header__right flex">
							<a href="/profil" class="header__profile">
								<img src="/wp-content/themes/minsporta/images/lk.svg" alt="">
							</a>
							<div class="burger">
								<div class="burder_click"></div>
								<div class="burder_click"></div>
								<div class="burder_click"></div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div id="content" class="site-content">
