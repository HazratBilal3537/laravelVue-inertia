import { defineConfig } from "vite";
import { resolve } from "node:path";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import InertiaI18n from "inertia-i18n/vite";
import AutoImport from "unplugin-auto-import/vite";

export default defineConfig({
	resolve: {
		alias: {
			inertiaRoutes: resolve("vendor/adminui/inertia-routes"),
		},
	},
	plugins: [
		AutoImport({
			imports: [
				"vue",
				{
					"@inertiajs/vue3": ["router", "useForm"],
					inertiaRoutes: ["useRoute"],
					"vue-i18n": ["useI18n"],
				},
			],
			dirs: ["./resources/js/composables/**", "./resources/js/helpers/**"],
			dts: "./auto-imports.d.ts",
			vueTemplate: true,
			eslintrc: {
				enabled: true,
				filepath: "./.eslintrc-auto-import.json",
				globalsPropValue: true,
			},
		}),
		laravel({
			input: ["resources/css/app.postcss", "resources/js/app.js"],
			ssr: "resources/js/ssr.js",
			refresh: true,
		}),
		InertiaI18n(),
		vue(),
	],
});
