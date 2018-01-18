var gulp          = require('gulp');
var path          = require("path");
var watch         = require('gulp-watch');
var browser       = require('browser-sync').create();
var env           = require('gulp-env');
var exec          = require('gulp-exec')
var debug         = require('gulp-debug');
require('dotenv').config();

// build task
gulp.task('build', gulp.series(buildSyllabus));

// Default task
gulp.task('default', gulp.series('build', server, watcher));

// Build files
function buildSyllabus() {
  return new Promise(function(resolve, reject) {
      gulp.src('./', {read:false})
          .pipe(debug())
          .pipe(exec('bash syllabus.sh'));
      resolve();
    });
}

// bring up the Browser Sync server
function server(done) {
  browser.init({
    files: ['{src,assignments,course_schedule,course_syllabus'],
    browser: 'google chrome',
    https: true,
    open: true,
    reloadDelay: 500,
    reloadDebounce: 500,
    server: {
      baseDir: "./"
    }
  });
  done();
}

// watcher tasks
function watcher() {
    // Watch files
    gulp.watch(['src/**/*.*','course_schedule/**/*.*','course_syllabus/**/*.*'])
        .on('all', gulp.series(buildSyllabus, browser.reload));
    gulp.watch(['assignments/**/*.*'])
        .on('all', gulp.series(browser.reload));
}
