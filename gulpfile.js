var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssmin = require('gulp-cssmin');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var notify = require('gulp-notify');
var rename = require('gulp-rename');

// CSS
gulp.task('css', function() {
	return gulp.src(['assets/scss/style.scss'])
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest('assets/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(cssmin())
		.pipe(gulp.dest('assets/css'))
		.pipe(notify("CSS generated!"))
	;
});

gulp.task('field_css', function() {
	return gulp.src(['assets/scss/field.scss'])
		.pipe(sass())
		.pipe(autoprefixer())
		.pipe(gulp.dest('registry/nja/assets/css'))
		.pipe(rename({suffix: '.min'}))
		.pipe(cssmin())
		.pipe(gulp.dest('registry/nja/assets/css'))
		.pipe(notify("CSS2 generated!"))
	;
});

// JS
gulp.task('js', function() {
	gulp.src('assets/js/src/**/*.js')
		.pipe(concat('script.js'))
		.pipe(gulp.dest('assets/js/dist'))
		.pipe(uglify())
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest('assets/js/dist'))
		.pipe(notify("JS generated!"))
	;
});

// Default
gulp.task('default',function() {
	gulp.watch('assets/scss/**/*.scss',['css', 'field_css']);
	gulp.watch('assets/js/src/**/*.js',['js']);
});