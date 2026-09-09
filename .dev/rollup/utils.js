/**
 * Check if the provided entry index represents the first entry in the bundle.
 *
 * @param {number} index Index from the Rollup hook callback.
 * @returns {boolean} True when the entry is the first file, otherwise false.
 */
export const isFirstEntry = (index) => index === 0
