import { createInertiaApp } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
import { createSSRApp, h } from "vue";
import useInertiaI18nVue from "inertia-i18n/vue";
import { createInertiaPageResolver, registerPlugins } from "./setup";
import { useInertiaRoutes } from "inertiaRoutes";

createServer((page) =>
	createInertiaApp({
		page,
		render: renderToString,
		resolve: createInertiaPageResolver(import.meta.glob("./pages/**/*.vue", { eager: true })),
		setup({ App, props, plugin }) {
			const inertiaRoutesPlugin = useInertiaRoutes(props);
			const inertiaI18nPlugin = useInertiaI18nVue(props);

			return createSSRApp({
				render: () => h(App, props),
			})
				.use(registerPlugins)
				.use(inertiaRoutesPlugin)
				.use(inertiaI18nPlugin)
				.use(plugin);
		},
	}),
);
