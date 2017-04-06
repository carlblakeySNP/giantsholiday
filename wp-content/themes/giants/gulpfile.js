var gulp = require('gulp');
var replace = require('gulp-replace');
var concat = require('gulp-concat');
var less = require('gulp-less');
var prefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var refresh = require('gulp-livereload');
var lr = require('tiny-lr');
var server = lr();

//Name of Template
var themeName = 'Giants'; 			// Caps Lowercase
var themeSlug = 'giants';				// lowercase
var themeURI = 'giantsenterprises.com';				// themedomain.com
var author = 'John Hanusek';				// Name of Author
var authorURI = 'bricksf.com';				// mydomain.com
var description = 'This is a custom theme for Giants Enterprises';			// MyTheme is the best theme evar!
var version = '0.0.1';				// 0.0.1
var tags = '';					// apples, oranges, bananas


gulp.task('scripts', function() {
    gulp.src([
            'src/js/plugins/slick.js',
            'src/js/plugins/jquery.simplemodal-1.4.4.js',
    		'src/js/main.js'
    	])
        .pipe(jshint())
    	.pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest('build/js/'))
        .pipe(refresh(server))
});

gulp.task('styles', function() {
    gulp.src(['src/less/style.less'])
        .pipe(less().on('error', function (err) {
            console.log(err);
        }))
        .pipe(minifyCSS())
        .pipe(prefix(['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'], { cascade: true }))
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('build/css/'))
        .pipe(refresh(server))
});


gulp.task('images', function(){
	gulp.src(['src/img/*'])
		.pipe(gulp.dest('build/img/'))
        .pipe(refresh(server))
});




gulp.task('lr-server', function() {
    server.listen(35729, function(err) {
        if(err) return console.log(err);
    });
});

gulp.task('watch', function () {
    gulp.watch('src/js/**', ['scripts']);
    gulp.watch('src/less/**', ['styles']);
    gulp.watch('src/img/**', ['images']);
});

gulp.task('production', ['scripts','styles','images']);
gulp.task('dev', ['scripts', 'styles', 'images']);

gulp.task('build', ['production']);
gulp.task('default', ['dev','watch']);

