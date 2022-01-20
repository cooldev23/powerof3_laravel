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

mix.options({
    processCssUrls: true,
})
.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
.extract([
    'datatables.net',
    'datatables.net-dt',
    'flatpickr',
    'tinymce'
])
.copy(['node_modules/tinymce/themes/'], 'public/js/themes')
    .copy(['node_modules/tinymce/skins/'], 'public/js/skins')
    .copy(['node_modules/tinymce/plugins/'], 'public/js/plugins')
    .copy(['node_modules/tinymce/icons/'], 'public/js/icons');
    
mix.styles([
    'node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'node_modules/flatpickr/dist/flatpickr.min.css',
], 'public/css/vendor.css').version();;
