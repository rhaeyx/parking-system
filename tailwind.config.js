/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors');

module.exports = {
	content: ['./app/Views/**/*.php'],
	theme: {
		colors: {
			primary: '#3498db',
			secondary: '#2ecc71',
			...colors,
		},
		extend: {},
	},
	plugins: [],
};
