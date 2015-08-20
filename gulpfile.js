var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([

            'libs/sweetalert-dev.js'
        ], './public/js/libs.js')

        .scripts([
            'libs/bootstrap.js'
        ], './public/js/bootstrap.js')
        .scripts([
            'libs/jquery-2.1.4.min.js'
        ], './public/js/jquery-2.1.4.min.js')

        .scripts([
            'libs/crimibook.js'
        ], './public/js/crimibook.js')

        .scripts([
            'libs/bootstrap-multiselect.js'
        ], './public/js/bootstrap-multiselect.js')

        .styles([

            'libs/sweetalert.css'
        ], './public/css/libs.css')

        .styles([

            'libs/bootstrap-multiselect.css'
        ], './public/css/bootstrap-multiselect.css');

});
