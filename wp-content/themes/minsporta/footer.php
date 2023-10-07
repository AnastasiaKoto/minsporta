<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

?>

</div><!-- #content -->

<footer id="footer" class="footer">
	<div class="container">
		<div class="footer__content flex">
			<div class="footer__top flex">
				<div class="footer__logo">
					<img src="<?php echo get_field('footer_logo', 'option'); ?>" alt="">
				</div>
				<nav class="footer__nav">
					<ul class="flex">
						<li><a href="#about">О премии</a></li>
						<li><a href="#news">Новости</a></li>
						<li><a href="#gallery">Галерея</a></li>
						<li><a href="#partners">Партнеры</a></li>
						<li><a href="#footer">Контакты</a></li>
					</ul>
				</nav>
				<div class="footer__soc flex">
					<a href="<?php echo get_field('vk', 'option'); ?>">
						<img src="/wp-content/themes/minsporta/images/vk.svg" alt="">
					</a>
					<a href="<?php echo get_field('tg', 'option'); ?>">
						<img src="/wp-content/themes/minsporta/images/tg.svg" alt="">
					</a>
				</div>
			</div>
			<div class="footer__bottom flex">
				<a href="tel:<?php echo get_field('tel_link', 'option'); ?>" class="footer__link"><?php echo get_field('tel_front', 'option'); ?></a>
				<a href="mailto:<?php echo get_field('mail', 'option'); ?>" class="footer__mail"><?php echo get_field('mail', 'option'); ?></a>
				<div class="footer__copyright">
					2011 — 2023 Eжегодная национальная премия событийной индустрии «Событие года»Организатор премии — Национальная ассоциация организаторов мероприятий (НАОМ). Политика конфиденциальности Публичная оферта
				</div>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
