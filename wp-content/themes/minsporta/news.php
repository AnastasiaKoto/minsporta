<?  
/* Template Name: Новости
*/

get_header();

$args = array(
	'post_type' => 'post',
	'posts_per_page' => -1,
	'cat' => 2,
	'orderby' => 'date',
	'order' => 'ASC'
);
//категория новости
$posts = get_posts($args);
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
	<section id="news" class="news">
		<div class="container">
			<h2 class="section__title">Новости</h2>
			<div class="news__list grid">
				<?php foreach ($posts as $post) {
	setup_postdata($post); ?>
				<div class="news__card flex">
					<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
					<div class="news__date"><?php echo get_the_date(); ?></div>
					<div class="small__title">
						<?php echo get_the_title(); ?>
					</div>
					<a href="<?php echo get_permalink(); ?>" class="news__card-link">
						Читать далее
					</a>
				</div>
				<?php } wp_reset_postdata(); ?>
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
<?php get_footer(); ?>