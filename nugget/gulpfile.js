const
    gulp = require("gulp"),
    // sass = require("gulp-sass"),
    sass = require('gulp-sass')(require('sass')),
    sassGlob = require('gulp-sass-glob'),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    sourcemaps = require("gulp-sourcemaps"),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    saveLicense = require('uglify-save-license'),
    rename = require('gulp-rename'),
    browserify = require('gulp-browserify'),
    minified_suffix = ".min",
    file_size = 'compressed',
    paths = {
        watch_scss: [
            "./assets/scss/**/*.{scss,css}",
            "./template/**/*.{scss,css}",
        ],
        watch_js: "./assets/js/**/*.js",
        styles_person_1: {
            src: [
                "./assets/scss/style.{scss,css}",
                "./assets/scss/style-admin.{scss,css}",
                "./template/flexible/**/*.{scss,css}",
            ],
            dest: "./css/",
        },
        styles_person_2: {
            src: [
                "./assets/scss/style2.{scss,css}",
                "./assets/scss/style2-admin.{scss,css}",
                "./template/flexible/**/*.{scss,css}",
            ],
            dest: "./css/",
        },
        scripts: {
            src: [
                "./assets/js/scripts.js",
                "./assets/js/scripts-admin.js",
            ],
            dest: "./js/",
        }
    };

function styles(src, dest) {
    return (
        gulp
            .src(src)
            .pipe(sourcemaps.init())
            .pipe(rename({suffix: ".min"}))
            .pipe(sassGlob())
            .pipe(sass({outputStyle: file_size})).on('error', sass.logError)
            .pipe(postcss([autoprefixer()]))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(dest))
    );
}

function scripts() {
    return (
        gulp
            .src(paths.scripts.src)
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(rename({suffix: minified_suffix}))
            .pipe(browserify())
            .pipe(babel({presets: ['@babel/env']}))
            .pipe(uglify({output: {comments: saveLicense}}))
            .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.scripts.dest))
    )
}

function watchScripts() {
    gulp.watch(paths.watch_js, scripts)
}

gulp.task('compile:styles_1', function () {
    return styles(paths.styles_person_1.src, paths.styles_person_1.dest)
});

gulp.task('compile:styles_2', function () {
    return styles(paths.styles_person_2.src, paths.styles_person_2.dest)
});

gulp.task('watch:styles_1', function () {
    gulp.watch(paths.watch_scss, gulp.series('compile:styles_1'));
});

gulp.task('watch:styles_2', function () {
    gulp.watch(paths.watch_scss, gulp.series('compile:styles_2'));
});

gulp.task('compile:scripts', () => scripts());
gulp.task('watch:scripts', () => watchScripts());

gulp.task('compile:all_1', gulp.parallel('compile:styles_1', "compile:scripts"));
gulp.task('compile:all_2', gulp.parallel('compile:styles_2', "compile:scripts"));

gulp.task('watch:all_1', gulp.parallel('watch:styles_1', "watch:scripts"));
gulp.task('watch:all_2', gulp.parallel('watch:styles_2', "watch:scripts"));
