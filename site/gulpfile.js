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
  bootstrapPath = 'node_modules/bootstrap-sass/assets';
  mix.sass(['app.scss', 'home.scss'])
  .scripts(['navbar.js', 'trilobyte.js', 'colors.js'])
  .copy(bootstrapPath + '/fonts', 'public/fonts')
  .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
  .copy('node_modules/whatwg-fetch/fetch.js', 'public/js');
});
