import { registerComponents } from "vue3-auto-vite-components";
import SvgIcon from "vue3-icon";

/**
 * General registration function
 */
export const registerPlugins = (app) => {
	app.use(registerComponents, {
		namespace: "Evo",
		resolveIndex: true,
		sync: import.meta.glob("../components/sync/**/*.{vue,js}", {
			eager: true,
		}),
		async: import.meta.glob("../components/async/**/*.{vue,js}"),
		asyncLoading: import.meta.glob("../components/async/**/*Loading.{vue,js}", {
			eager: true,
		}),
	});
	app.component("SvgIcon", SvgIcon);
};
