const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

    mix.styles([

    	'admin/bootstrap.min.css',
        'admin/sb-admin.css',
        'admin/moris.css'
    ],'./public/css/admin.css');

});

elixir(function(mix) {

    mix.scripts([
        'admin/jquery.js',
        'admin/bootstrap.min.js',
        'admin/raphael.min.js',
        'admin/moris.min.js',
        'admin/moris-data.js'
        
    ],'./public/js/admin.js')


    .scripts([

        'admin/jquery.js',
        'admin/bootstrap.min.js',
        'admin/plugins/morris/raphael.min.js',
        'admin/plugins/morris/morris.min.js',
        'admin/plugins/morris/morris-data.js',
        'admin/plugins/morris/raphael.min.js'


        ],'public/css/charts/morris.js')

    .scriptsIn('admin/plugins/flot','public/css/charts/flot.js');

});
