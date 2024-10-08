import DefaultLayout from "../layouts/DefaultLayout.vue";

/**
 * Takes a page glob and creates a function that can be
 * called by the Inertia render handler for page resolution
 *
 * @param { object } pages The page glob from `import.meta.glob`
 */
export const createInertiaPageResolver = (pages) => {
	return async function (name) {
		const resolvedPage = pages[`./pages/${name}.vue`];
		const page = typeof resolvedPage === "function" ? await resolvedPage() : resolvedPage;

		page.default.layout = page.default.layout ?? DefaultLayout;
		return page;
	};
};
