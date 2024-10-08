import { useSSRContext, computed, mergeProps, unref, resolveComponent, createSSRApp, h } from "vue";
import { ssrRenderAttrs, ssrInterpolate, ssrRenderComponent, ssrRenderSlot } from "vue/server-renderer";
import { createInertiaApp } from "@inertiajs/vue3";
import createServer from "@inertiajs/vue3/server";
import { renderToString } from "@vue/server-renderer";
import { registerComponents } from "vue3-auto-vite-components";
const _sfc_main$2 = /* @__PURE__ */ Object.assign({
  layout: false
}, {
  __name: "Error",
  __ssrInlineRender: true,
  props: {
    status: { type: Number, required: true }
  },
  setup(__props) {
    const props = __props;
    const title = computed(() => {
      return {
        503: "503: Service Unavailable",
        500: "500: Server Error",
        404: "404: Page Not Found",
        403: "403: Forbidden"
      }[props.status];
    });
    const description = computed(() => {
      return {
        503: "Sorry, we are doing some maintenance. Please check back soon.",
        500: "Whoops, something went wrong on our servers.",
        404: "Sorry, the page you are looking for could not be found.",
        403: "Sorry, you are forbidden from accessing this page."
      }[props.status];
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex w-full h-full justify-center items-center text-center flex-col grow" }, _attrs))}><h1 class="text-4xl uppercase font-bold mb-8">${ssrInterpolate(unref(title))}</h1><div>${ssrInterpolate(unref(description))}</div></div>`);
    };
  }
});
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/pages/Error.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const __vite_glob_0_0 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: _sfc_main$2
}, Symbol.toStringTag, { value: "Module" }));
const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};
const _sfc_main$1 = {};
function _sfc_ssrRender$1(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "container" }, _attrs))}>This is the home page</div>`);
}
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/pages/Home.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const Home = /* @__PURE__ */ _export_sfc(_sfc_main$1, [["ssrRender", _sfc_ssrRender$1]]);
const __vite_glob_0_1 = /* @__PURE__ */ Object.freeze(/* @__PURE__ */ Object.defineProperty({
  __proto__: null,
  default: Home
}, Symbol.toStringTag, { value: "Module" }));
const _sfc_main = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  const _component_EvoHeader = resolveComponent("EvoHeader");
  const _component_EvoFooter = resolveComponent("EvoFooter");
  _push(`<!--[-->`);
  _push(ssrRenderComponent(_component_EvoHeader, null, null, _parent));
  _push(`<main>`);
  ssrRenderSlot(_ctx.$slots, "default", {}, null, _push, _parent);
  _push(`</main>`);
  _push(ssrRenderComponent(_component_EvoFooter, null, null, _parent));
  _push(`<!--]-->`);
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/layouts/DefaultLayout.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const DefaultLayout = /* @__PURE__ */ _export_sfc(_sfc_main, [["ssrRender", _sfc_ssrRender]]);
const createInertiaPageResolver = (pages) => {
  return async function(name) {
    const resolvedPage = pages[`./pages/${name}.vue`];
    const page = typeof resolvedPage === "function" ? await resolvedPage() : resolvedPage;
    page.default.layout = page.default.layout ?? DefaultLayout;
    return page;
  };
};
const registerPlugins = (app) => {
  app.use(registerComponents, {
    namespace: "Evo",
    resolveIndex: true,
    sync: /* @__PURE__ */ Object.assign({}),
    async: /* @__PURE__ */ Object.assign({}),
    asyncLoading: /* @__PURE__ */ Object.assign({})
  });
};
createServer(
  (page) => createInertiaApp({
    page,
    render: renderToString,
    resolve: createInertiaPageResolver(/* @__PURE__ */ Object.assign({ "./pages/Error.vue": __vite_glob_0_0, "./pages/Home.vue": __vite_glob_0_1 })),
    setup({ App, props, plugin }) {
      return createSSRApp({
        render: () => h(App, props)
      }).use(registerPlugins).use(plugin);
    }
  })
);
