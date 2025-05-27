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

 mix.options({
    processCssUrls: false
});

 /*
    ========================
            Assets
    ========================
*/

mix.sass('resources/sass/light/assets/main.scss', 'public/assets/css/light')
    .sass('resources/sass/dark/assets/main.scss', 'public/assets/css/dark')

    .sass('resources/sass/layouts/vertical-light-menu/light/loader.scss', 'public/layouts/vertical-light-menu/css/light')
    .sass('resources/sass/layouts/vertical-light-menu/dark/loader.scss', 'public/layouts/vertical-light-menu/css/dark')

    .sass('resources/sass/layouts/vertical-light-menu/light/structure.scss', 'public/layouts/vertical-light-menu/css/light')
    .sass('resources/sass/layouts/vertical-light-menu/dark/structure.scss', 'public/layouts/vertical-light-menu/css/dark')

    // Authentication

    // Components
    .sass('resources/sass/light/assets/components/list-group.scss','public/assets/css/light/components')
    .sass('resources/sass/dark/assets/components/list-group.scss','public/assets/css/dark/components')

    // Element


    /*
        ========================
                Plugins
        ========================
    */

    //Apex
    .sass('resources/sass/light/plugins/apex/custom-apexcharts.scss','public/plugins/css/light/apex')
    .sass('resources/sass/dark/plugins/apex/custom-apexcharts.scss','public/plugins/css/dark/apex')

    //Autocomplete
    .sass('resources/sass/light/plugins/autocomplete/css/custom-autoComplete.scss','public/plugins/css/light/autocomplete/css')
    .sass('resources/sass/dark/plugins/autocomplete/css/custom-autoComplete.scss','public/plugins/css/dark/autocomplete/css')

    //Bootstrap range slider
    .sass('resources/sass/light/plugins/bootstrap-range-Slider/bootstrap-slider.scss','public/plugins/css/light/bootstrap-range-Slider')
    .sass('resources/sass/dark/plugins/bootstrap-range-Slider/bootstrap-slider.scss','public/plugins/css/dark/bootstrap-range-Slider')

    //fullcalendar
    .sass('resources/sass/light/plugins/fullcalendar/custom-fullcalendar.scss','public/plugins/css/light/fullcalendar')
    .sass('resources/sass/dark/plugins/fullcalendar/custom-fullcalendar.scss','public/plugins/css/dark/fullcalendar')

    //users-list
    .sass('resources/sass/light/assets/apps/users-list.scss','public/assets/css/light/apps')
    .sass('resources/sass/dark/assets/apps/users-list.scss','public/assets/css/dark/apps')

    //inscriptions-list
    .sass('resources/sass/light/assets/apps/inscriptions-list.scss','public/assets/css/light/apps')
    .sass('resources/sass/dark/assets/apps/inscriptions-list.scss','public/assets/css/dark/apps')

    //workd-list
    .sass('resources/sass/light/assets/apps/works-list.scss','public/assets/css/light/apps')
    .sass('resources/sass/dark/assets/apps/works-list.scss','public/assets/css/dark/apps')

    //beneficiarios_becas-list
    .sass('resources/sass/light/assets/apps/beneficiarios_becas-list.scss','public/assets/css/light/apps')
    .sass('resources/sass/dark/assets/apps/beneficiarios_becas-list.scss','public/assets/css/dark/apps')

    //suppliers
    .sass('resources/sass/light/assets/apps/suppliers.scss','public/assets/css/light/apps')
    .sass('resources/sass/dark/assets/apps/suppliers.scss','public/assets/css/dark/apps')

    //tagify
    .sass('resources/sass/light/plugins/tagify/custom-tagify.scss','public/plugins/css/light/tagify')
    .sass('resources/sass/dark/plugins/tagify/custom-tagify.scss','public/plugins/css/dark/tagify')



    .sourceMaps();
