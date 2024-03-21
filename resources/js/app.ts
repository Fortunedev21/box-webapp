import "../css/bootstrap.min.css";
import "../css/bx-icons.min.css";
import "../css/icons.min.css";
import "../css/remix-icons.min.css";

import BootstrapVue from "bootstrap-vue-next";
import "bootstrap-vue-next/dist/bootstrap-vue-next.css";
import "simplebar/dist/simplebar.min.js";
import "../css/main.css";

import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

import MainLayout from "@/layouts/main-layout.vue";

import defaultLayout from "@/layouts/default-layout.vue";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name: string) => {
        const page: any = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue")
        );

        // console.log(name);

        const layout =
            name.includes("login") || name.includes("inscription")
                ? defaultLayout
                : MainLayout;

        page.default.layout = layout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(BootstrapVue)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
    progress: {
        color: "#BC8A1A",
        includeCSS: true,
        showSpinner: true,
    },
});
