// const gulp = require('gulp');

const { src , series , dest , watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');
const terser = require('gulp-terser');



// Kompilacja scss na css
function compilescss(){
	return src('src/scss/*.scss')	
   	.pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(minify())
    .pipe(dest('dist/css'))
    .pipe(browserSync.stream());
}

// JS min

function jsmin(){
	return src('src/js/*.js')
	.pipe(terser())	
	.pipe(dest('dist/js'))
    .pipe(browserSync.stream());
}

function watchTasks(){
	browserSync.init({
	    proxy: "http://localhost/olimadas-re"
	});

	// sledzone pliki
	watch( 'src/scss/*.scss' , compilescss );
	watch( 'src/js/*.js' , jsmin );
	watch('./**/*.php').on("change" , browserSync.reload );
	// watch('./js/**/*.js').on("change" , browserSync.reload );

}

exports.compilescss = compilescss;
exports.jsmin = jsmin;
exports.watchTasks = watchTasks;
