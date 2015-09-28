var gulp        = require('gulp');
var browserSync = require('browser-sync');
var plumber = require('gulp-plumber');
var compass     = require('gulp-compass');
var reload      = browserSync.reload;

// Start the server
gulp.task('browser-sync', function() {
  browserSync.init({
   // Change as required
   proxy: "http://attackdev.local",
   });
});

// Compile SASS & auto-inject into browsers
gulp.task('compass', function () {
    return gulp.src('sass/**/*.scss')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
        .pipe(compass({
          config_file: './config.rb',
          css: 'css',
          sass: 'sass',
          sourcemap: true,
        }))
        .pipe(browserSync.reload({stream:true}));
});

gulp.task('autoprefixer', function () {
    var postcss      = require('gulp-postcss');
    var sourcemaps   = require('gulp-sourcemaps');
    var autoprefixer = require('autoprefixer');

    return gulp.src('./src/*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer({ browsers: ['last 2 versions'] }) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./dest'));
});
// Reload all Browsers
gulp.task('bs-reload', function () {
    browserSync.reload();
});

// Watch scss AND html files, doing different things with each.
gulp.task('default', ['browser-sync', 'compass','autoprefixer'], function () {
    gulp.watch("sass/*.scss", ['compass']);
    gulp.watch("*.html").on("change", browserSync.reload);
});