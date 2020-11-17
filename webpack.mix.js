const mix = require('laravel-mix');

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


mix.copyDirectory('node_modules/mdbootstrap/js', 'public/node_modules/mdbootstrap/js');
mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/event-maker/index.js', 'public/js/event-maker');

mix.copyDirectory('node_modules/mdbootstrap/css', 'public/node_modules/mdbootstrap/css');
mix.copy('resources/css/app.css', 'public/css');