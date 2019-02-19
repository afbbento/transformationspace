var gulp = require('gulp');
var cleanCSS = require('gulp-clean-css');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();



// Minify CSS
gulp.task('css', function() {
  return gulp.src([
      './assets/css/styles.css',
      './assets/css/modal.css',
      './assets/css/responsive.css',
      '!./assets/css/*.min.css'
    ])
    .pipe(cleanCSS())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
});


// Minify JavaScript
gulp.task('js', function() {
  return gulp.src([
      './js/*.js',
      '!./js/*.min.js'
    ])
    .pipe(uglify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./js'))
    .pipe(browserSync.stream());
});



// Default task
gulp.task('default', ['css', 'js']);


// Configure the browserSync task
gulp.task('browserSync', function() {
  browserSync.init({
   proxy: "localhost/transformation-space",
   port: 8000,
    // server: {
    //   baseDir: "./"
    // }
  });
});

// Dev task

gulp.task('dev', ['css', 'js', 'browserSync'], function() {
  gulp.watch(['./assets/css/styles.css', './assets/css/responsive.css', './assets/css/modal.css'], ['css']);
  gulp.watch('./assets/js/*.js', ['js']);
  gulp.watch('*.html', browserSync.reload);
});



