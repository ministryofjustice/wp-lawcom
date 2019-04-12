const mix_ = require('laravel-mix');

mix_.setPublicPath('./dist/')
    .js('./assets/js/_main.js', 'js/main.min.js')
    .css('./assets/css/editor-style.css', 'css/editor-style.min.css')
    .less('./assets/less/main.less', 'css/main.min.css')
    .options({
        processCssUrls: false
    })
    .copy('./assets/img/*', 'dist/css/img/')
    .copy('./node_modules/bootstrap/fonts/*', 'dist/fonts/');

if (mix_.inProduction()) {
    mix_.version();
} else {
    mix_.sourceMaps();
}
