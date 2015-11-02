/* This project uses [Gulp] (http://gulpjs.com/) to automate the following tasks:
 ********************************************************************************************************* */

// Gulp libraries
var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    scss = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    newer = require('gulp-newer'),
    imagemin = require('gulp-imagemin'),
    git = require('gulp-git'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr(),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

// Path for original and compressed/optimalized images
var imgSrc = 'assets/original-images/*';
var imgDest = 'dist/images';


// Supress crash on error, throw error
function swallowError (error) {
  console.log(error.toString());
  this.emit('end');
}

// Task Wordpress administration SCSS complilation and CSS minification
// command: "gulp admin-styles"
gulp.task('admin-styles', function(){
  return gulp.src(
      [
        'assets/styles/editor.scss', 
        'assets/styles/admin.scss',
        'assets/styles/login.scss'
      ]
    ) 
    .pipe(scss())
    .on('error', swallowError)
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('dist/styles/admin'));
});

// Task for Internet Explorer v8 and less SCSS complilation and CSS minification
// command: "gulp ie-legacy-styles"
gulp.task('ie-legacy-styles', function(){
  return gulp.src(
      [
        'assets/styles/ie-legacy.scss'
      ]
    ) 
    .pipe(scss())
    .on('error', swallowError)
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('dist/styles'));
});

// Main style task
// command: "gulp scss"
gulp.task('scss', function(){
  return gulp.src('scss/style.scss') 
      .pipe(scss())
      .on('error', swallowError)
      .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
      .pipe(gulp.dest(''))
      .pipe(gulp.dest('dist/styles'));
});

// Main style task for minification
gulp.task('css-min', ['scss'], function(){
  return gulp.src('style.css') 
      .pipe(rename({suffix: '.min'}))
      .pipe(minifycss())
      .pipe(gulp.dest('dist/styles'));
});

// Image optimalization task
// command: "gulp images"
gulp.task('images', function() {
  return gulp.src(imgSrc, {base: 'assets/original-images'})
        .pipe(newer(imgDest))
        .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
        .pipe(gulp.dest(imgDest));
});

// Task for merging all Javascript files into app.js and minifying them into app.min.js
gulp.task('compress-js', function() {
  return gulp.src(
      [
        'assets/scripts/vendor/jquery.js',
        'assets/scripts/vendor/jquery-migrate.js',
        'assets/scripts/vendor/bootstrap.js',
        'assets/scripts/app.js'
      ]
    )
    .pipe(concat('app'))
    .pipe(rename({suffix: '.js'}))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify({
      compress: {
        //drop_debugger: false
        drop_debugger: true
      }
    }))
    .on('error', swallowError)
    .pipe(gulp.dest('dist/scripts'))
});

// Task for merging all legacy Internet Explorer support files into two separate files (app-legacy-head.js, app-legacy-footer.js)
// and minifying them.
// commands: 
//    "gulp compress-legacy-js-head"
//    "gulp compress-legacy-js-footer"
gulp.task('compress-legacy-js-head', function() {
  return gulp.src(
      [
        'assets/scripts/legacy/es5-shim.js',
        'assets/scripts/legacy/html5shiv.js'
      ]
    )
    .pipe(concat('app-legacy-head'))
    .pipe(rename({suffix: '.js'}))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .on('error', swallowError)
    .pipe(gulp.dest('dist/scripts'))
});
gulp.task('compress-legacy-js-footer', function() {
  return gulp.src(
      [
        'assets/scripts/legacy/app-ie-legacy.js',
        'assets/scripts/legacy/respondjs.js'
      ]
    )
    .pipe(concat('app-legacy-footer'))
    .pipe(rename({suffix: '.js'}))
    .pipe(gulp.dest('dist/scripts'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .on('error', swallowError)
    .pipe(gulp.dest('dist/scripts'))
});

// Make gulp command execute all of the above tasks
// command: "gulp"
gulp.task('default', ['css-min', 'images', 'compress-js', 'compress-legacy-js-head', 'compress-legacy-js-footer', 'ie-legacy-styles', 'admin-styles']);

// Task for watching changes in files of all specified tasks. Removes the need of using "gulp [taskName]" command. Gulp executes itself on file save.
// command: "gulp watch"
gulp.task('watch', function() {
  // Listen on port 35729
  server.listen(35729, function (err) {
      if (err) {
        return console.log(err);
      }
      
      // Watch .scss and .js files
      gulp.watch('scss/**/*.scss', ['css-min']);
      gulp.watch(['assets/styles/admin.scss', 'assets/styles/editor.scss'], ['admin-styles']);
      gulp.watch('assets/styles/ie-legacy.scss', ['ie-legacy-styles']);
      gulp.watch('assets/original-images/**', ['images']);
      gulp.watch('assets/scripts/vendor/*.js', ['compress-js']);
      gulp.watch('assets/scripts/app.js', ['compress-js']);
      gulp.watch('assets/scripts/legacy/*.js', ['compress-legacy-js-head', 'compress-legacy-js-footer']);
    });

});
gulp.task('init', function(){
  git.init();
});
gulp.task('commit', function(){
  return gulp.src('./*')
  .pipe(git.add())
  .pipe(git.commit('initial commit'));
});
gulp.task('setup',['css-min','init','commit']);