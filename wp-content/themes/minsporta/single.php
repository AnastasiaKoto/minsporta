<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();

$current_post_id = get_the_ID(); // Получаем ID текущего поста

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10, // Вывести все посты
    'post__not_in' => array($current_post_id), // Исключить текущий пост
	'orderby' => 'date',
	'order' => 'ASC'
);
//категория новости
$query = new WP_Query($args);
?>
<main class="main">
	<div class="mobile__menu">
		<div class="container">
			<nav class="header__menu">
				<ul class="flex">
					<li><a href="#about">О премии</a></li>
					<li><a href="#news">Новости</a></li>
					<li><a href="#gallery">Галерея</a></li>
					<li><a href="#partners">Партнеры</a></li>
					<li><a href="#">Контакты</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<section class="news__single">
		<div class="container">
			<button onclick="history.back();" class="btn__back">Вернуться</button>
			<h2 class="section__title"><?php the_title(); ?></h2>
			<div class="news__content flex">
				<?php if ($query->have_posts()) { ?>
				<div class="news__sidebar">
					<div class="side__title">
						Другие новости
					</div>
					<div class="news__links grid">
						<?php while ($query->have_posts()) {
						$query->the_post();
						?>
						<div>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							<p>
								<?php echo get_the_date(); ?>
							</p>
						</div>
						<?php
						} ?>
					</div>
				</div>
				<?php } 
				wp_reset_postdata();
				?>
				<div class="news__txt">
					<div class="single__date">
						<?php echo get_the_date(); ?>
					</div>
					<div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	let headerLinks = document.querySelectorAll('.header__menu li a');
	if(headerLinks) {
		headerLinks.forEach(item => {
			let href = item.getAttribute("href");
  			item.setAttribute("href", "/" + href);
		})
	}
</script>

<?php
get_footer();
