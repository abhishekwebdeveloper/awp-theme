/**
 * Observe Intersection.
 */

/**
 * Setup observer on an element.
 *
 * @param {String} selector Selector for the element on which needs to observed.
 * @param {Function} visibleCallback Callback invoked when the element enters the viewport.
 * @param {Function} notVisibleCallback Callback invoked when the element leaves the viewport.
 * @param {String} threshold Threshold is a number between 0 and 1. It represents the viewable area of the element in the viewport.
 */
export const observeIntersection = (
	selector,
	visibleCallback,
	notVisibleCallback,
	threshold = 0,
) => {
	// Get elements.
	const els = document.querySelectorAll(selector)

	// Do not proceed if there are no elements.
	if (!els.length) {
		notVisibleCallback()
		return
	}

	// For each element.
	els.forEach((el) => {
		// Setup intersection observer.
		const observer = new IntersectionObserver(
			function (entries) {
				// isIntersecting is true when element and viewport are overlapping.
				if (entries[0].isIntersecting === true) {
					visibleCallback()
				} else {
					notVisibleCallback()
				}
			},
			{ threshold },
		)

		// Setup observer.
		observer.observe(el)
	})
}
