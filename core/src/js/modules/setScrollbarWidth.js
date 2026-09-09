/**
 * Set Scrollbar Width.
 */

export const setScrollbarWidth = () => {
	const width = window.innerWidth - document.documentElement.clientWidth

	document.documentElement.style.setProperty(
		'--awp-scrollbar-width',
		`${width}px`,
	)
}
