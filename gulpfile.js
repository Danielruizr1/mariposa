const gulp = require('gulp');
const htmlMin = require('gulp-htmlmin');
const cleanCss = require('gulp-clean-css');
const rev = require('gulp-rev');
const useMin = require('gulp-usemin');
const uglify = require('gulp-uglify');
const livereload = require('gulp-livereload');

var files = ['assets/templates/Seguimiento.php','assets/templates/agregar_Seguimiento.php', 
    'assets/templates/agregar_inscripcion.php',  'assets/templates/buscar_Seguimiento.php',
    'assets/templates/buscar_inscripcion.php', 'assets/templates/inscripcion.php',
    'assets/templates/seguimientos.php', 'assets/templates/usuarios.php' ];


gulp.task('watch', ['templates'], function(){

  livereload.listen();

  gulp.watch(['assets/templates/**/*.php', 'assets/js/**/*.js', 'assets/css/**/*.css'], ['templates']);

});

gulp.task('templates', function (){

  files.forEach(function(file){
    userminPHP(file);

  });

  livereload();
  

});

function userminPHP(file){
  return gulp.src(file)
    .pipe(useMin({
      css: [ rev(), cleanCss() ],
      html: [ htmlMin({collapseWhitespace: true}) ],
      php: [ htmlMin({collapseWhitespace: true}) ],
      js: [uglify({mangle:false}), rev() ],
      jsv: [uglify({mangle:false}), rev() ],
      inlinejs: [ uglify() ],
      inlinecss: [ cleanCss(), 'concat' ]
    }))
    .pipe(gulp.dest('renders/'));

};