export default {
	extends: ['stylelint-config-standard'],
	ignoreFiles: ['assets/**', 'node_modules/**', 'vendor/**'],
	plugins: ['stylelint-order'],
	rules: {
		'import-notation': 'string',
		'media-feature-range-notation': 'prefix',
		'no-descending-specificity': null,
		'order/order': [
			'dollar-variables',
			'at-rules',
			'custom-properties',
			'declarations',
			{ type: 'at-rule', name: 'media' },
			'rules',
		],
		'order/properties-alphabetical-order': true,
		'selector-class-pattern': null,
		'value-keyword-case': [
			'lower',
			{
				camelCaseSvgKeywords: true,
			},
		],
	},
}
