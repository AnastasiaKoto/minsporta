<?  
/* Template Name: Страница ACF
*/

get_header();
acf_form_head();
$current_user = wp_get_current_user();
$vip_guests = get_field('vip_limit', 'user_' . $current_user->ID);
$parc_guests = get_field('parc_limit', 'user_' . $current_user->ID);
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
				<span class="active">Добавить приглашенных</span>
				<a href="/profil/skachat-priglasitelnye/">Скачать пригласительные</a>
				<a href="<?php echo wp_logout_url(home_url()); ?>">Выйти</a>
			</div>
			<?php if($vip_guests || $parc_guests) { ?>
			<div class="descr__forms">
				Вы можете добавить <?php if($vip_guests) { echo '<span>' . $vip_guests . ' гостей</span>'; if($parc_guests) { echo ' и '; } } if($parc_guests) { echo '<span>' . $parc_guests . ' участников</span>'; }  ?>
			</div>
			<?php } ?>
			<div class="profile__forms">
				<div data-current="0" data-limit="<?php echo $vip_guests; ?>" data-modal="guest__modal" class="profile__form">
					<?php 
									  $options = array(
										  'fields' => ['field_65040e0130045'],
										  'form_attributes' => array(
											  'method' => 'POST',
											  'action' => admin_url("admin-post.php"),
										  ),
										  'html_before_fields' => sprintf(
											  '<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
						<input type="hidden" name="user_id" value="user_%s">',
											  $current_user->ID
										  ),
										  'post_id' => "user_{$current_user->ID}",
										  'form' => true,
										  'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update Profile">Сохранить</button>',
									  );
									  //print_r($options);
									  acf_form($options);
					?>
				</div>
				<div data-current="0" data-limit="<?php echo $parc_guests; ?>" data-modal="parc__modal" class="profile__form">
					<?php 
									  $options = array(
										  'fields' => ['field_6505d06d0b877'],
										  'form_attributes' => array(
											  'method' => 'POST',
											  'action' => admin_url("admin-post.php"),
										  ),
										  'html_before_fields' => sprintf(
											  '<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
						<input type="hidden" name="user_id" value="user_%s">',
											  $current_user->ID
										  ),
										  'post_id' => "user_{$current_user->ID}",
										  'form' => true,
										  'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update Profile">Сохранить</button>',
									  );
									  acf_form($options);
					?>
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
<div class="modal__bg">
	<div class="modal__block" id="guest__modal">
		<div class="modal__close">
			<div></div>
			<div></div>
		</div>
		<div class="modal__title">ВНИМАНИЕ</div>
		<div class="guest__list">
			Лимит на внесение гостей не должен превышать <?php if($vip_guests) { echo $vip_guests; } else { echo '0'; } ?> мест. Гости сверх лимита не будут сохранены.
		</div>
	</div>
	<div class="modal__block" id="parc__modal">
		<div class="modal__close">
			<div></div>
			<div></div>
		</div>
		<div class="modal__title">ВНИМАНИЕ</div>
		<div class="guest__list">
			Лимит на внесение участников не должен превышать <?php if($parc_guests) { echo $parc_guests; } else { echo '0'; } ?> мест. Участники сверх лимита не будут сохранены.
		</div>
	</div>
</div>
<script>
	let headerLinks = document.querySelectorAll('.header__menu li a');
	if(headerLinks) {
		headerLinks.forEach(item => {
			let href = item.getAttribute("href");
			item.setAttribute("href", "/" + href);
		})
	}

	const buttonPlus = document.querySelectorAll('a.button-primary');

	function countInp() {
		document.querySelectorAll('.profile__form').forEach(form => {
			let filledInputs = Array.from(form.querySelectorAll('.acf-fields .acf-repeater .acf-table .acf-row .acf-input input')).filter(input => input.value.trim() !== '');
			let count = 0;
			if(filledInputs) {
				count = filledInputs.length;
			}
			console.log(count);
			form.setAttribute('data-current', count);
		})
	}

	countInp();

	buttonPlus.forEach(btn => {
		btn.addEventListener('click', function() {
			let parent = btn.closest(".profile__form");
			let limit = parent.getAttribute('data-limit');
			let current = Number(parent.getAttribute('data-current'));
			current++;
			parent.setAttribute('data-current', current);
			if(current > limit) {
				let modalBg = document.querySelector('.modal__bg');
				//let modalPopap = document.querySelector('.modal__block');
				let popapId = parent.getAttribute('data-modal');
				let modalPopap = document.querySelector('#' + popapId);
				let closeBtn = document.querySelector('.modal__close');

				modalPopap.classList.add('active');
				modalBg.classList.add('active');

				if(modalBg) {
					modalBg.addEventListener('click', function() {
						modalPopap.classList.remove('active');
						modalBg.classList.remove('active');
					})
				}
				if(closeBtn) {
					closeBtn.addEventListener('click', function() {
						modalPopap.classList.remove('active');
						modalBg.classList.remove('active');
					})
				}
			}
		})
	})
</script>
<?php get_footer(); ?>