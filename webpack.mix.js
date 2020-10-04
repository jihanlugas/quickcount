const mix = require('laravel-mix');

// require('laravel-mix-tailwind');
const tailwindcss = require('tailwindcss');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    [
        'resources/js/app.js',
        // 'node_modules/cropper/dist/cropper.js',
    ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .stylus('node_modules/flatpickr/src/style/flatpickr.styl', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('tailwind.config.js')],
    })
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
;

if (mix.inProduction()) {
    mix
        .version();
}
