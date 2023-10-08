jQuery(document).ready(function($) {
	$('.tabs__caption').slick({
		infinite: false,
		slidesToShow: 6,
		slidesToScroll: 3,
		centralMode: true,

		responsive: [
			{
				breakpoint: 1280,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 1075,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 520,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
		]
	});

	$('.jury__slider').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 3,
		dots: true,

		responsive: [
			{
				breakpoint: 1075,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 520,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
		]
	});

	if ($(window).width() <= '1075') {
		$('.news__list_mob').slick({
			infinite: false,
			slidesToShow: 2,
			slidesToScroll: 1,

			responsive: [
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						dots: true,
					}
				},
			]
		});
	}

	$(function () {
		$('.burger').click(function () {
			$('.mobile__menu').toggleClass('active');
			$(this).toggleClass('active');
		})
	});
	
	$("a[href^='#']").on("click", function () {
		let href = $(this).attr("href");

		$("html, body").animate({
			scrollTop: $(href).offset().top
		});
		$('.burger').removeClass('active');
		$('.mobile__menu').removeClass('active');

		return false;
	});

	var tabButtons = document.getElementsByClassName("about__tab");
	var tabContents = document.getElementsByClassName("tabs__content");

	for (var i = 0; i < tabButtons.length; i++) {
		tabButtons[i].addEventListener("click", function() {
			for (var j = 0; j < tabButtons.length; j++) {
				tabButtons[j].classList.remove("active");
			}
			this.classList.add("active");

			// Получаем индекс кликнутой кнопки
			var buttonIndex = Array.prototype.indexOf.call(tabButtons, this);

			// Показываем только контентный блок с соответствующим индексом
			for (var k = 0; k < tabContents.length; k++) {
				tabContents[k].classList.remove("active");
			}

			// Добавляем класс "active" только на соответствующий блок
			tabContents[buttonIndex].classList.add("active");
		});
	}

	var downloadButton = $(".download__pdf");
	$(downloadButton).on("click", function() {
		let form = document.createElement('form');
		form.method = 'POST';
		form.action = '/wp-admin/admin-ajax.php?action=getPdf'; // URL для генерации и получения PDF документа

		let qr = document.createElement('input');
		qr.type = 'hidden';
		qr.name = 'qr';
		qr.value = $(this).attr("data-qr");
		form.appendChild(qr);

		let type = document.createElement('input');
		type.type = 'hidden';
		type.name = 'type';
		type.value = $(this).attr("data-type");
		form.appendChild(type);

		document.body.appendChild(form);
		form.submit();
		document.body.removeChild(form);
	})

})