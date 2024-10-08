import Typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
	content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue"],
	theme: {
		container: {
			center: true,
			padding: {
				DEFAULT: "1rem",
				sm: "2rem",
				lg: "4rem",
				xl: "5rem",
				"2xl": "6rem",
			},
		},
		extend: {
			screens: {
				"3xl": "1924px",
			},
		},
	},
	plugins: [Typography()],
};
