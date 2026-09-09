/**
 * Set Scrolled Status.
 */

export const setScrollDirectionAttribute = () => {
	let scrollPosition = window.pageYOffset
	let scrollDirection

	window.addEventListener('scroll', () => {
		const newScrollPosition = window.pageYOffset
		const newScrollDirection =
			newScrollPosition < scrollPosition ? 'up' : 'down'

		if (newScrollDirection !== scrollDirection) {
			scrollDirection = newScrollDirection
			document.body.dataset.arScrollDirection = scrollDirection
		}

		scrollPosition = newScrollPosition
	})
}

export const setScrolledStatus = () => {
	const styles = getComputedStyle(document.body)
	const adminBarHeight = parseInt(
		styles.getPropertyValue('--awp-admin-bar-height'),
	)

	setDataAttribute(window.scrollY, adminBarHeight)

	window.addEventListener('scroll', () => {
		setDataAttribute(window.scrollY, adminBarHeight)
	})
}

const setDataAttribute = (scrollPosition, offset) => {
	const status = scrollPosition > offset ? 'true' : 'false'
	const oldStatus = document.body.dataset.awpSiteScrolled

	if (!oldStatus || status != oldStatus) {
		document.body.dataset.awpSiteScrolled = status
	}
}
