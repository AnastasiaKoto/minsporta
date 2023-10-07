<?  
/* Template Name: Галерея
*/

get_header(); ?>

<main class="main">
	<div class="mobile__menu">
		<div class="container">
			<nav class="header__menu">
				<ul class="flex">
					<li><a href="/#about">О премии</a></li>
					<li><a href="/#news">Новости</a></li>
					<li><a href="/#gallery">Галерея</a></li>
					<li><a href="/#partners">Партнеры</a></li>
					<li><a href="/#">Контакты</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<section class="gallery">
		<div class="container">
			<h1 class="section__title">Галерея</h1>
			<?php
			$gallery = get_field('gallery', 'option');
			if($gallery) { ?>
			<div class="gallery__list grid">
				<?php
				foreach($gallery as $image) { ?>
				<a href="<?php echo $image; ?>" data-fancybox="gallery" class="gallery__card">
					<img src="<?php echo $image; ?>" alt="">
				</a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</section>
</main>
<script>
	Fancybox.bind('[data-fancybox="gallery"]', {
		infinite: false,
	});
	let headerLinks = document.querySelectorAll('.header__menu li a');
	if(headerLinks) {
		headerLinks.forEach(item => {
			let href = item.getAttribute("href");
  			item.setAttribute("href", "/" + href);
		})
	}
</script>
<?php get_footer(); ?>