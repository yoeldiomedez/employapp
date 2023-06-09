const mix = require('laravel-mix');

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

 // App Layout (Default Bootstrap UI)
 mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');

// Auth Layout
mix.styles([
        'resources/assets/global/plugins/font-awesome/css/font-awesome.min.css',
        'resources/assets/global/plugins/simple-line-icons/css/simple-line-icons.min.css',
        'resources/assets/global/plugins/bootstrap/css/bootstrap.min.css',
        'resources/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        'resources/assets/global/css/components.min.css',
        'resources/assets/global/css/plugins.min.css',
        'resources/assets/pages/css/login.min.css',
        'resources/assets/global/plugins/select2/css/select2.min.css',
        'resources/assets/global/plugins/select2/css/select2-bootstrap.min.css',
        'resources/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css'
    ], 'public/css/auth.css')
    .scripts([
        'resources/assets/global/plugins/jquery.min.js',
        'resources/assets/global/plugins/bootstrap/js/bootstrap.min.js',
        'resources/assets/global/plugins/js.cookie.min.js',
        'resources/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'resources/assets/global/plugins/jquery.blockui.min.js',
        'resources/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        'resources/assets/global/scripts/app.min.js',
        'resources/assets/global/plugins/backstretch/jquery.backstretch.min.js',
        'resources/assets/global/plugins/select2/js/select2.full.min.js',
        'resources/assets/global/plugins/select2/js/i18n/es.js',
        'resources/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
        'resources/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js'
    ], 'public/js/auth.js');

// Main Layout
mix.styles([
    'resources/assets/global/plugins/font-awesome/css/font-awesome.min.css',
    'resources/assets/global/plugins/simple-line-icons/css/simple-line-icons.min.css',
    'resources/assets/global/plugins/bootstrap/css/bootstrap.min.css',
    'resources/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
    'resources/assets/global/css/components.min.css',
    'resources/assets/global/css/plugins.min.css',
    'resources/assets/layouts/layout2/css/layout.min.css',
    'resources/assets/layouts/layout2/css/themes/blue.min.css',
    'resources/assets/layouts/layout2/css/custom.min.css',
    'resources/assets/global/plugins/bootstrap-toastr/toastr.min.css',
    'resources/assets/global/plugins/select2/css/select2.min.css',
    'resources/assets/global/plugins/select2/css/select2-bootstrap.min.css',
    'resources/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css',
    'resources/assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css',
    'resources/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css',
    'resources/assets/pages/css/profile.min.css',
    'resources/assets/pages/css/invoice.min.css'
], 'public/css/main.css')
.scripts([
    'resources/assets/global/plugins/jquery.min.js',
    'resources/assets/global/plugins/bootstrap/js/bootstrap.min.js',
    'resources/assets/global/plugins/js.cookie.min.js',
    'resources/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
    'resources/assets/global/plugins/jquery.blockui.min.js',
    'resources/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
    'resources/assets/global/scripts/app.min.js',
    'resources/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
    'resources/assets/layouts/layout2/scripts/layout.min.js',
    'resources/assets/global/plugins/bootstrap-toastr/toastr.min.js',
    'resources/assets/global/plugins/select2/js/select2.full.min.js',
    'resources/assets/global/plugins/select2/js/i18n/es.js',
    'resources/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
    'resources/assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js',
    'resources/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
    'resources/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js'
], 'public/js/main.js');
    
// Font Icons
mix.copyDirectory('resources/assets/global/plugins/font-awesome/fonts', 'public/fonts')
   .copyDirectory('resources/assets/global/plugins/simple-line-icons/fonts', 'public/fonts')
   .copyDirectory('resources/assets/global/plugins/bootstrap/fonts', 'public/fonts');