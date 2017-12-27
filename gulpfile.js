var gulp = require('gulp')
var sass = require('gulp-sass')
var sourcemaps = require('gulp-sourcemaps');

gulp.task('build', function () {
  return gulp.src('assets/styles/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sass().on('error', sass.logError))
  .pipe(sourcemaps.write('./'))
  .pipe(gulp.dest('dist/styles'));
});

gulp.task('watch', function () {
  gulp.watch('assets/**/*.scss', ['build'])
});

gulp.task('default', ['build']);