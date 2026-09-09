/**
 * Theme Core JS Index.
 */

'use strict'

// Modules.
import { setScrollbarWidth } from './modules/setScrollbarWidth'
import { setScrolledStatus } from './modules/setScrolledStatus'

// When DOM is loaded.
document.addEventListener('DOMContentLoaded', () => {
	setScrollbarWidth()
	setScrolledStatus()
})

// When window is resized.
window.addEventListener('resize', () => {
	setScrollbarWidth()
})
