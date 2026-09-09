/**
 * Observe Attributes.
 */

export const observeAttributes = (target, callback) => {
	// Create an observer instance linked to the callback function.
	const observer = new MutationObserver((mutationList) => {
		for (const mutation of mutationList) {
			if (mutation.type === 'attributes') {
				callback(mutation)
			}
		}
	})

	// Start observing the target node for configured mutations.
	observer.observe(target, { attributes: true })
}
