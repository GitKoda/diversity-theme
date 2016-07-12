//grab our gulp packages
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    jshint = require('gulp-jshint'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    sourcemaps = require('gulp-sourcemaps'),
    minify = require('gulp-minify');

gulp.task('default', ['watch']);

gulp.task('build-css', function() {
  return gulp.src('source/css/**/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('css'));
});

// configure the jshint task
gulp.task('jshint', function() {
    return gulp.src('source/js/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('build-js', function() {
  return gulp.src('source/js/**/*.js')
  	.pipe(minify({
		ext:{
            src:'-debug.js',
            min:'.min.js'
        }
	}))
    .pipe(gulp.dest('js'));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function() {
    gulp.watch('source/css/**/*.scss', ['build-css']);
    gulp.watch('source/js/**/*.js', ['jshint']);
    gulp.watch('source/js/**/*.js', ['build-js']);
});

