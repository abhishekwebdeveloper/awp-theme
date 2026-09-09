/**
 * Theme Core JS Index.
 */

'use strict'

// Modules.
import { setScrollbarWidth } from './modules/setScrollbarWidth'

// When DOM is loaded.
document.addEventListener('DOMContentLoaded', () => {
	setScrollbarWidth()
})

// When window is resized.
window.addEventListener('resize', () => {
	setScrollbarWidth()
})
