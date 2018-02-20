var gulp         = require('gulp'),
    ftp          = require('vinyl-ftp'),
    gutil        = require('gulp-util'),
    sass         = require('gulp-sass'),
    uglify       = require('gulp-uglify'),
    rename       = require('gulp-rename'),
    concat       = require('gulp-concat'),
    include      = require('gulp-include'),
    cleancss     = require('gulp-clean-css'),
    autoprefixer = require('gulp-autoprefixer');

//
// sass

gulp.task('styles', function() {
  return gulp.src('src/scss/application.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('application.css'))
    .pipe(autoprefixer({ browsers: ['last 2 versions', 'iOS >= 8', 'Safari >= 8'] }))
    .pipe(gulp.dest('dist/css'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(cleancss({advanced: false, aggressiveMerging: false}))
    .pipe(gulp.dest('dist/css'));
});

//
// js

gulp.task('scripts', function() {
  return gulp.src('src/js/application.js')
    .pipe(include())
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/js'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .on('error', onError)
    .pipe(gulp.dest('dist/js'));
});

gulp.task('watch', function() {
  gulp.watch('src/scss/**/*.scss', ['styles']);
  gulp.watch('src/js/**/*.js', ['scripts']);
});

//
// Default task

gulp.task('default', ['watch', 'styles', 'scripts']);

//
// error handler

function onError(err) {
  console.log(err);
  this.emit("end");
}
