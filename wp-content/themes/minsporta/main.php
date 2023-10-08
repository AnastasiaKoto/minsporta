<?  
/* Template Name: Главная
*/

get_header();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
	'cat' => 2
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
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <section id="cover" class="cover">
            <div class="container">
                <div class="cover__content flex">
                    <div class="cover__block">
                        <h1 class="cover__title"><?php the_title(); ?></h1>
                        <div class="cover__descr">
                            <?php echo get_field('cover_descr'); ?>
                        </div>
                    </div>
                    <div class="cover__img">
                        <img src="<?php echo get_field('cover_img'); ?>" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="about">
            <div class="container">
                <div class="about__descr flex">
                    <div class="about__text-content">
                        <h2 class="section__title">О премии</h2>
                        <p><?php echo get_field('about_descr'); ?></p>
                    </div>
                    <div class="about__img">
                        <img src="<?php echo get_field('about_img'); ?>" alt="">
                    </div>
                </div>
				<h2 class="section__title">Номинации</h2>
				<?php if(get_field('about_tabs')) {
				while (have_rows('about_tabs')) : the_row(); 
					$tabs = get_sub_field('tabs');
					$contents = get_sub_field('tabs_content');
					$counterTab = 1;
					$counterCont = 1;
				?>
                <div class="tabs">
                    <div class="tabs__caption slick-slider">
						<?php foreach($tabs as $tab) { ?>
                        <div class="<?php if($counterTab == 1) { echo 'active'; } ?> about__tab"><?php echo $tab['tabs_name'];  ?></div>
						<?php $counterTab++; } ?>
                    </div>
					<?php foreach($contents as $content) { 
					$cards = $content['nomin_card'];
					?>
                    <div class="tabs__content <?php if($counterCont == 1) { echo 'active'; }  ?>">
						<?php if($content['nomin_descr']) { ?>
						<div class="tabs__descr">
							<?php echo $content['nomin_descr']; ?>
						</div>
						<?php } ?>
                        <div class="nominants__list grid">
							<?php 
							if($cards) {
							foreach($cards as $card) { ?>
                            <div class="nominants__card">
                                <img src="<?php echo $card['photo']; ?>" alt="">
                                <div class="card__txt nominants__card-txt">
                                    <div class="small__title"><?php echo $card['fio']; ?></div>
                                    <div class="personal"><?php echo $card['post']; ?></div>
                                </div>
                            </div>
							<?php } } ?>
                        </div>
                    </div>
					<?php $counterCont++; } ?>
                </div>
				<?php break; endwhile;
				 } ?>
            </div>
        </section>
		<?php if(get_field('jury')) { ?>
        <section id="jury" class="jury">
            <div class="container">
                <h2 class="section__title">Жюри</h2>
                <div class="jury__slider slick-slider">
				<?php $j_cards = get_field('jury');
						foreach($j_cards as $card) {
					?>
                    <div>
                        <img src="<?php echo $card['j_img']; ?>" alt="">
                        <div class="card__txt jury__card-txt">
                            <div class="small__title"><?php echo $card['j_fio']; ?></div>
                            <div class="personal"><?php echo $card['j_post']; ?></div>
                        </div>
                    </div>
					<?php 
						} ?>
                </div>
            </div>
        </section>
		<?php } ?>
		<?php if($posts) { ?>
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
                <div class="news__list_mob slick-slider">
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
                <a href="/novosti/" class="more__btn">Смотреть все</a>
            </div>
        </section>
		<?php } ?>
		<?php if(get_field('gallery', 'option')) { ?>
        <section id="gallery" class="gallery">
            <div class="container">
                <h2 class="section__title">Галерея</h2>
				<?php
				$gallery = get_field('gallery', 'option');
				$count = 1;
				if($gallery) { ?>
                <div class="gallery__list grid">
					<?php
					foreach($gallery as $image) { ?>
                    <div class="gallery__card">
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
					<?php $count++; if($count > 8) { break; }  } ?>
                </div>
				<?php } ?>
                <a href="/galereya/" class="more__btn">Смотреть все</a>
            </div>
        </section>
		<?php } ?>
		<?php 
		$str_partners = get_field('str_partners');
		$gen_partners = get_field('gen_partners');
		$of_partners = get_field('of_partners');
		?>
		<?php if($str_partners || $gen_partners || $of_partners) { ?>
        <section id="partners" class="partners">
            <div class="container">
                <h2 class="section__title">Партнеры</h2>
				<?php if($str_partners) { ?>
                <div class="partners__group">
                    <h3 class="sub__title">Стратегические партнеры:</h3>
                    <div class="partners__logos grid">
						<?php foreach($str_partners as $str_partner) { ?>
                        <div>
                            <img src="<?php echo $str_partner['logo']; ?>" alt="">
                        </div>
						<?php } ?>
                    </div>
                </div>
				<?php } ?>
				<?php if($gen_partners) { ?>
                <div class="partners__group">
                    <h3 class="sub__title">Генеральные партнеры:</h3>
                    <div class="partners__logos grid">
						<?php foreach($gen_partners as $gen_partner) { ?>
                        <div>
                            <img src="<?php echo $gen_partner['logo']; ?>" alt="">
                        </div>
						<?php } ?>
                    </div>
                </div>
				<?php } ?>
				<?php if($of_partners) { ?>
                <div class="partners__group">
                    <h3 class="sub__title">Официальные партнеры:</h3>
                    <div class="partners__logos grid">
						<?php foreach($of_partners as $of_partner) { ?>
                        <div>
                            <img src="<?php echo $of_partner['logo']; ?>" alt="">
                        </div>
						<?php } ?>
                    </div>
                </div>
				<?php } ?>
            </div>
        </section>
		<?php } ?>
    </main>
<?php get_footer(); ?>