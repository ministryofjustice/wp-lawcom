const mix_ = require('laravel-mix');


mix_.setPublicPath('./dist')
	.js('./assets/js/_main.js', 'js/scripts.min.js')
	.sass('./assets/sass/main.scss', 'css/main.min.css');


if (mix_.inProduction()) {
	mix_.version();
} else {
	mix_.sourceMaps();
}
