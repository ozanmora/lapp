const mix = require("laravel-mix");

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

 /*
mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        //
    ]
);
*/

mix.setPublicPath("public");

mix.version();

mix.autoload({
    jquery: ["$", "jQuery", "jquery", "window.jQuery"],
});

mix.js("resources/assets/js/admin-lte.js", "public/js");
mix.js("resources/assets/js/auth.js", "public/js");

mix.sass("resources/assets/sass/admin-lte.scss", "public/css");
mix.sass("resources/assets/sass/auth.scss", "public/css");

mix.extract(
    [
        "sweetalert",
        "select2",
        "admin-lte",
        "axios",
        "bootstrap-sass",
        "fastclick",
        "jquery",
        "jquery-slimscroll",
        "lodash",
        "vue",
    ],
    "public/js/vendor.js"
);
