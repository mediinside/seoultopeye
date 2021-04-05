$(function(){
	//메인슬라이드
	var swiper = new Swiper('#main-bnnr .swiper-container', {
		effect: 'fade',
		loop: true,
		pagination: {
			el: '#main-bnnr .swiper-pagination',
			clickable: true,
		},
		speed: 1000,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		// navigation: {
		// 	nextEl: '.swiper-button-next',
		// 	prevEl: '.swiper-button-prev',
		// },
	});
	//메인 미들 슬라이드
	var swiper = new Swiper('#main-middle-slide .swiper-container', {
		loop: true,
		pagination: {
			el: '#main-middle-slide .swiper-pagination',
			type: 'fraction',
		},
		speed: 1000,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '#main-middle-slide .swiper-button-next',
			prevEl: '#main-middle-slide .swiper-button-prev',
		},
	});
	//서브 미들 슬라이드
	var swiper = new Swiper('#system .swiper-container', {
		loop: true,
		speed: 600,
		autoplay: {
			delay: 3500,
			disableOnInteraction: false,
		},
		touchRatio: 0,
		navigation: {
			nextEl: '#system .swiper-button-next',
			prevEl: '#system .swiper-button-prev',
		},
	});

	//로케이션
	var locIdx = $("#sub-bnnr").data('index')-1;
	$("#location li").eq(locIdx).addClass('on');

	//서브페이지 최하단 배너
	var pageText = $("#sub-bnnr .cont h2").text();
	$("#sub-bottom-bnnr .cont h2 em").text(pageText);

	//햄버거 버튼
	$(".menu-button").on("click", function (e) {
		$(this).toggleClass("cross");
		$('.nav-bottom.on .menu>li>a').click(function () { return false; });
		$('.nav-bottom.on .menu>li>a').on("click", function () {
			$(this).siblings('.sub-menu').toggleClass('on');
		});
	});
	
});