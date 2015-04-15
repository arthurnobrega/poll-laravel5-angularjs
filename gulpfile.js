var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.less('app.less');
// });

var gulp = require('gulp');
var karma = require('gulp-karma');
var gutil = require('gulp-util');

gulp.task('karma', function() {
    return gulp.src(['public/pollApp/tests/*.js'], { read: false })
        .pipe(karma({ reporter: 'list' }))
        .on('error', gutil.log);
});

gulp.task('watch-karma', function() {
    gulp.watch(['public/pollApp/**', 'public/pollApp/tests/**'], ['karma']);
});
