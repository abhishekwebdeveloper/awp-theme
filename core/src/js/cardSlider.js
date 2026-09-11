import Swiper from 'swiper'
import { Pagination } from 'swiper/modules'
import { Navigation } from 'swiper/modules'

// Swiper styles
import 'swiper/css'
import 'swiper/css/pagination'
import 'swiper/css/navigation'

export const cardSlider = () => {
	const swiper = new Swiper('[data-awp-card-slider]', {
		modules: [Pagination, Navigation],

		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		grabCursor: true,
		simulateTouch: true,

		slidesPerView: 1,
		spaceBetween: 24,

		breakpoints: {
			768: {
				slidesPerView: 2,
			},
			1280: {
				slidesPerView: 3,
			},
		},
	})

	return swiper
}
