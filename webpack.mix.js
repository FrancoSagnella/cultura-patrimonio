let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css');
