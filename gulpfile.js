var gulp          = require('gulp');
var path          = require("path");
var watch         = require('gulp-watch');
var browser       = require('browser-sync').create();
var env           = require('gulp-env');
var exec          = require('gulp-exec')
var debug         = require('gulp-debug');
var markdown      = require('gulp-markdown');
var insert        = require('gulp-insert')
var markdownPdf   = require('gulp-markdown-pdf');
var replace       = require('gulp-replace');
var fs            = require('fs');
require('dotenv').config();

var packageData = JSON.parse(fs.readFileSync('./package.json'));

// Default task
gulp.task('default', gulp.series(buildSyllabus, renderSyllabusToHtml, renderSyllabusToPDF, server, watcher));

// Production task
gulp.task('production', gulp.series(buildSyllabus, renderSyllabusToHtml, renderSyllabusToPDF));

// Build files
function buildSyllabus() {
  return new Promise(function(resolve, reject) {
      gulp.src('./', {read:false})
          .pipe(exec('bash ./syllabus.sh'));
      resolve();
    });
}

// Render syllabus files to PDF
function renderSyllabusToPDF() {
  return new Promise(function(resolve, reject) {
      gulp.src('syllabus.md')
          .pipe(markdownPdf({
              paperFormat: 'Letter',
              paperOrientation: 'portrait'
          }))
            .pipe(gulp.dest('./'));
      resolve();
    });
}
// Render syllabus files to html and pdf
function renderSyllabusToHtml() {
  return new Promise(function(resolve, reject) {
      gulp.src('syllabus.md')
          .pipe(markdown())
          .pipe(insert.prepend('<!DOCTYPE html>'+
          '<html>' +
            '<head>' +
            '<meta charset="utf-8">' +
            '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">' +
            '<title>' + packageData.name.replace('-', ' ') + '</title>' +
            '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">' +
            '<style media="screen">'+ fs.readFileSync('./style/style.css') +'</style>' +
          '</head>' +
          '<body>' +
            '<div class="container">')
        )
          .pipe(insert.append('</div></body>'+
          '</html>'))
          .pipe(replace('<table', '<table class="table table-bordered-bottom"'))
          .pipe(gulp.dest('./'));
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
    gulp.watch(['assignments/**/*.*', 'sandbox/**/*.*', 'site/**/*.*'])
        .on('all', gulp.series(browser.reload));
}
