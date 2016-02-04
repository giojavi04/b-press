'use strict';

/**
 * [gulp define the dependencies]
 * @type {[var]}
 */
var gulp  = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-cssnano'),
    sourcemaps = require('gulp-sourcemaps'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber')

/**
 * [Compile Sass, Autoprefix and minify]
 * @param  {[type]} ) {             return gulp.src('./assets/scss*.scss')    .pipe(plumber(function(error) {            gutil.log(gutil.colors.red(error.message));            this.emit('end');    }))    .pipe(sass())    .pipe(autoprefixer({            browsers: ['last 2 versions'],            cascade: false        }))    .pipe(gulp.dest('./assets/css/'))         .pipe(rename({suffix: '.min'}))    .pipe(minifycss())    .pipe(gulp.dest('./assets/css/'))} [description]
 * @return {[type]}   [description]
 */
gulp.task('styles', function() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
    }))
    .pipe(sass())
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: true
        }))
    .pipe(gulp.dest('./dist/css'))     
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('./dist/css'))
});

/**
 * [JSHint, concat, and minify JavaScript]
 * @param  {[type]} ) {             return gulp.src([                   './assets/js/site/*.js'  ])    .pipe(plumber())    .pipe(jshint())    .pipe(jshint.reporter('jshint-stylish'))    .pipe(concat('scripts.js'))    .pipe(gulp.dest('./assets/js/min'))    .pipe(rename({suffix: '.min'}))    .pipe(uglify())    .pipe(gulp.dest('./assets/js/min'))} [description]
 * @return {[type]}   [description]
 */
gulp.task('scripts', function() {
  return gulp.src([ 
           // Grab your custom scripts
        './assets/js/*.js'
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./dist/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'))
});    

/**
 * [JSHint, concat, and minify Foundation Sites]
 * @return {[type]} [description]
 */
gulp.task('foundation-sites-js', function() {
  return gulp.src([
          // Jquery
          './node_modules/jquery/dist/jquery.js',

          //What-input
          './node_modules/what-input/what-input.js',

          // Foundation
          './node_modules/foundation-sites/dist/foundation.js',

  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./dist/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'))
});

/**
 * [Create the default task]
 * @param  {[type]} ){  gulp.start('styles', 'scripts',    'foundation-sites-js');  } [description]
 * @return {[type]}                          [description]
 */
gulp.task('default', function(){
  gulp.start('styles', 'scripts', 'foundation-sites-js'); 
})

gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

  // Watch site-js files
  gulp.watch('./assets/js/*.js', ['scripts']);

  // Watch foundation-js files
  gulp.watch('./node_modules/foundation-sites/js/*.js', ['foundation-sites-js']);

});