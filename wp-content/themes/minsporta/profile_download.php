<?  
/* Template Name: Скачать пригласительные
*/

get_header();
$current_user = wp_get_current_user();
$vip_guests = get_field('vip_list', 'user_' . $current_user->ID);
$parc_guests = get_field('participants_list', 'user_' . $current_user->ID);
?>

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
	<?php if ( is_user_logged_in() ) { ?>
	<section class="profile__section">
		<div class="container">
			<h1 class="section__title">
				<?php the_title(); ?>
			</h1>
			<div class="profile__menu flex">
				<a href="/profil/">Личный кабинет</a>
				<a href="/profil/dobavit-priglashennyh/">Добавить приглашенных</a>
				<span class="active">Скачать пригласительные</span>
				<a href="<?php echo wp_logout_url(home_url()); ?>">Выйти</a>
			</div>
			<div class="guests__list grid">
				<?php if($vip_guests) { ?>
				<div class="guests__group">
					<?php foreach($vip_guests as $v_guest) { ?>
					<div class="guest__row flex">
						<div class="name">
							<?php echo $v_guest['txt']; ?>
						</div>
						<div class="guests__form">
							<form action="/wp-admin/admin-ajax.php?action=getPdf" method="POST">
								<input type="hidden" value="<?php echo $v_guest['txt']; ?>" name="vip_guest">
								<button type="submit" class="btn-submit__single"></button>
							</form>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
				<?php if($parc_guests) { ?>
				<div class="guests__group">
					<?php foreach($vip_guests as $v_guest) { ?>
					<div class="guest__row flex">
						<div class="name">
							<?php echo $v_guest['txt']; ?>
						</div>
						<div class="guests__form">
							<form action="/wp-admin/admin-ajax.php?action=getPdf" method="POST">
								<input type="hidden" value="<?php echo $v_guest['txt']; ?>" name="vip_guest">
								<button type="submit" class="btn-submit__single"></button>
							</form>
						</div>
					</div>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
				<?php } else { ?>
	<section class="profile__section">
		<div class="container">
			<?php echo do_shortcode('[wppb-login]'); ?>
		</div>
	</section>
	<?php } ?>
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