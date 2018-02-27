var gulp          = require('gulp');
var path          = require("path");
var watch         = require('gulp-watch');
var browser       = require('browser-sync').create();
var env           = require('gulp-env');
var exec          = require('gulp-exec');
var debug         = require('gulp-debug');
var markdown      = require('gulp-markdown');
var insert        = require('gulp-insert');
var markdownPdf   = require('gulp-markdown-pdf');
var replace       = require('gulp-replace');
var fs            = require('fs');
require('dotenv').config();

var packageData = JSON.parse(fs.readFileSync('./package.json'));

// Build task
gulp.task('build', gulp.series(buildAssets));

// Default task
gulp.task('default', gulp.series('build', server, watcher));

// Production task
gulp.task('production', gulp.series('build'));

// build assets
function buildAssets() {
    return new Promise(function(resolve, reject) {
        gulp.src('public_html');
        resolve();
    });
}

function server(done) {
    browser.init({
        files: ['{src,public_html}/**/*.php'],
        host: process.env.SERVER_NAME,
        proxy: 'https://' + process.env.SERVER_NAME,
        browser: 'google chrome',
        https: true,
        open: true,
        reloadDelay: 500,
        reloadDebounce: 500
    });
    done();
}

// watcher tasks
function watcher() {
    // Watch files
    gulp.watch(['src/**/*.php','public_html/**/*.php', 'public_html/**/*.css', 'public_html/**/*.js'])
        .on('all', gulp.series(browser.reload));
}
