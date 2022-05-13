const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */


mix
    .js('resources/js/app.js', 'public/js')
    // .js('resources/js/ui.js', 'public/js')

    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .postCss('resources/css/ui.css', 'public/css', {}, [tailwindcss('resources/css/tailwind.ui.config.js')])
    .postCss('resources/css/admin.css', 'public/css', {}, [tailwindcss('resources/css/tailwind.admin.config.js')])
