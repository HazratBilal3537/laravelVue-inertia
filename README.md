<p align="center">
    <a href="https://evomark.co.uk" target="_blank" alt="Link to evoMark's website">
        <picture>
          <source media="(prefers-color-scheme: dark)" srcset="https://evomark.co.uk/wp-content/uploads/static/evomark-logo--dark.svg">
          <source media="(prefers-color-scheme: light)" srcset="https://evomark.co.uk/wp-content/uploads/static/evomark-logo--light.svg">
          <img alt="evoMark company logo" src="https://evomark.co.uk/wp-content/uploads/static/evomark-logo--light.svg" width="500">
        </picture>
    </a>
</p>

# Laravel 11 Application Template

## Introduction

This template installs a barebones Laravel 11 installation with the following features:

### General

-   **InertiaJS** / **Vue3** framework

### Backend

-   Basic auth controllers for login, forgot password, verify email and reset password
-   Command for `make:service` which creates and binds a service with a backing facade
-   Prebuilt services for flash messages, icon paths and page metadata included
-   Error handling with frontend page for Inertia errors

### Frontend

-   **Tailwind** and sensible presets
-   **InertiaRoutes** plugin
-   **InertiaI18n** plugin for using your localisation strings inside Vue
-   **Vue3AutoViteComponents** plugin which automatically imports components from `components/sync` and `components/async` directories.
-   Global Vue component for `SvgIcon` which registers [vue3-icon](https://www.npmjs.com/package/vue3-icon)
-   **UnpluginAutoImports** will auto-import from `vue`, `@inertiajs/vue3`, `vue-i18n`, `inertiaRoutes` and both `composables` and `helpers` directories.
-   Simple Header, Footer and DefaultLayout application structure.

### Development

-   Laravel pint configured for use via `composer pint`.
-   ESLint and Prettier for code-presentation enforcement
-   Merge support for `composer.local.json` file

## Installation

```sh
composer create-project -s dev evo-mark/inertia-11-template example-app
```

Then inside your created application folder:

-   Setup database and `.env` file.
-   `composer update`
-   `pnpm install`
-   `npm run dev`
