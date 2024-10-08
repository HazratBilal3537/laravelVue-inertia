import { createSSRApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { registerPlugins, createInertiaPageResolver } from "./setup";
import { useInertiaRoutes } from "inertiaRoutes";
import useInertiaI18nVue from "inertia-i18n/vue";

createInertiaApp({
	resolve: createInertiaPageResolver(import.meta.glob("./pages/**/*.vue")),
	setup({ el, App, props, plugin }) {
		const inertiaRoutesPlugin = useInertiaRoutes(props);
		const inertiaI18nPlugin = useInertiaI18nVue(props);

		createSSRApp({ render: () => h(App, props) })
			.use(plugin)
			.use(registerPlugins)
			.use(inertiaRoutesPlugin)
			.use(inertiaI18nPlugin)
			.mount(el);
	},
});
