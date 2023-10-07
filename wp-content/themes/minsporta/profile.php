<?  
/* Template Name: Профиль
*/

get_header();
$current_user = wp_get_current_user();
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
				<span class="active">Личный кабинет</span>
				<a href="/profil/dobavit-priglashennyh/">Добавить приглашенных</a>
				<a href="#">Скачать пригласительные</a>
				<a href="<?php echo wp_logout_url(home_url()); ?>">Выйти</a>
			</div>
			<div class="profile__content">
				<div class="profile__title">
					Здравствуйте <?php 
									  $user_name = get_user_meta($current_user->ID , 'first_name', true );
									  if(!$user_name) { echo $current_user->user_login; } else { echo $user_name; } ?>
				</div>
				<div class="profile__descr">
					Здесь вы можете изменить свои данные
				</div>
				<div class="profile__form">
					<?php echo do_shortcode('[wppb-edit-profile]'); ?>
				</div>
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