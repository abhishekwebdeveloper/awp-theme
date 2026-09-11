/**
 * Theme Core JS Index.
 */

'use strict'

// Modules.
import { setScrollbarWidth } from './modules/setScrollbarWidth'
import { setScrolledStatus } from './modules/setScrolledStatus'
import { cardSlider } from './cardSlider'

// When DOM is loaded.
document.addEventListener('DOMContentLoaded', () => {
	setScrollbarWidth()
	setScrolledStatus()
	cardSlider()
})

// When window is resized.
window.addEventListener('resize', () => {
	setScrollbarWidth()
})
