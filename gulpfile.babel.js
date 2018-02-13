//// Plug-ins/DevDependencies ////

var pkg          = require('./package.json');
var gulp         = require('gulp');
var plugins      = require('gulp-load-plugins')( { pattern: ['*'], scope: ["devDependencies"], }); // Automatically requires gulp plugins listed in package.json
var reload       = plugins.browserSync.reload; // For manual browser reload

//// Tasks ////

gulp.task('bootlint', function() {
    return gulp.src('./build/templates/page-home.html')
        .pipe(plugins.bootlint());
});

// browserSync init & config
gulp.task( 'browser-sync', function() { plugins.browserSync.init( {
   proxy: pkg.global.URL,
   host: pkg.global.host,
   open: "external",
   // Inject CSS changes.
   injectChanges: true,
   // port: 7000,
 });
});

// SCSS Task
gulp.task('styles', function () {
   gulp.src( pkg.styles.scssSRC )
   .pipe( plugins.sourcemaps.init() )
   .pipe( plugins.sass( {
     errLogToConsole: true,
     outputStyle: 'compact',
     precision: 10
   } ) )
   .on('error', console.error.bind(console))
   .pipe( plugins.sourcemaps.write( { includeContent: false } ) )
   .pipe( plugins.sourcemaps.init( { loadMaps: true } ) )
   .pipe( plugins.autoprefixer({
       browsers: ['last 2 versions'],
       cascade: false
   })) // autoprefixing for .css files
   .pipe( plugins.sourcemaps.write ( '/' ) )
   .pipe( gulp.dest( pkg.styles.cssDest ) )
   .pipe( plugins.filter( '**/*.css' ) ) // Filtering stream to only css files
   .pipe( plugins.mergeMediaQueries( { log: true } ) ) // Merge Media Queries only for .min.css version.
   .pipe( plugins.browserSync.stream() ) // Reloads style.css
   .pipe( plugins.rename( { suffix: '.min' } ) )
   .pipe( plugins.cleanCss() )
   .pipe( gulp.dest( pkg.styles.cssDest ) )
   .pipe( gulp.dest( pkg.styles.cssMinDest ) )
   .pipe( plugins.filter( '**/*.css' ) ) // Filtering stream to only css files
   .pipe( plugins.browserSync.stream() ) // Reloads style.min.css in the BS stream
   .pipe( plugins.notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
});

//PUG TASK
gulp.task('pug', function buildHTML() {
  return gulp.src( pkg.pug.pugSRC )
    .pipe(plugins.pug())
    .pipe(plugins.plumber())
    .pipe(plugins.htmlBeautify())
    .pipe(gulp.dest( pkg.pug.pugDest ))
});

// JS TASKS
gulp.task( 'vendorsJs', function() {
 gulp.src( pkg.scripts.vendorJsSRC )
   .pipe( plugins.concat( pkg.scripts.vendorJsName + '.js' ) ) // Concat all .js files into vendors.js
   .pipe( gulp.dest( pkg.scripts.vendorJsDest ) ) // Save vendors.js
   .pipe( plugins.rename( { // Rename to vendors.min.js
     basename: pkg.scripts.vendorJsName,
     suffix: '.min'
   }))
   .pipe( plugins.uglify() ) // Minify vendors.min.js
   .pipe( gulp.dest( pkg.scripts.vendorJsDest ) )
   .pipe( gulp.dest( pkg.scripts.vendorMinJsDest ) ) // Save vendors.min.js
   .pipe( plugins.notify( { message: 'Vendor JS Task Completed', onLast: true } ) );
});

gulp.task( 'customJS', function() {
   gulp.src( pkg.scripts.customJsSRC )
   .pipe( plugins.concat( pkg.scripts.customJsName + '.js' ) ) // Concat all .js files into custom.js
   .pipe( gulp.dest( pkg.scripts.customJsDest ) ) // Save custom.js
   .pipe( plugins.jshint()) // Run through jsHint
   .pipe( plugins.jshint.reporter('jshint-stylish')) // For a better looking reporter
   .pipe( plugins.jshintNotifyReporter() ) // jsHint system notifcation
   .pipe( plugins.rename( { // Rename to custom.min.js
     basename: pkg.scripts.customJsName,
     suffix: '.min'
   }))
   .pipe( plugins.uglify() ) // Minify custom.min.js
   .pipe( gulp.dest( pkg.scripts.customJsDest ) )
   .pipe( gulp.dest( pkg.scripts.customJsMinDest ) ) // Save custom.min.js
   .pipe( plugins.notify( { message: 'Custom JS Task Completed', onLast: true } ) );
});


// Process data in an array synchronously, moving onto the n+1 item only after the nth item callback
function doSynchronousLoop(data, processData, done) {
    if (data.length > 0) {
        const loop = (data, i, processData, done) => {
            processData(data[i], i, () => {
                if (++i < data.length) {
                    loop(data, i, processData, done);
                } else {
                    done();
                }
            });
        };
        loop(data, 0, processData, done);
    } else {
        done();
    }
}

// Process the critical path CSS one at a time
function processCriticalCSS(element, i, callback) {
    const criticalSrc = pkg.global.URL + element.url;
    const criticalDest = pkg.styles.ccssDest + element.template + "_critical.min.css.php";

    let criticalWidth = 1200;
    let criticalHeight = 1200;
    if (element.template.indexOf("amp_") !== -1) {
        criticalWidth = 600;
        criticalHeight = 19200;
    }
    plugins.fancyLog("-> Generating critical CSS: " + plugins.chalk.cyan(criticalSrc) + " -> " + plugins.chalk.magenta(criticalDest));
    plugins.critical.generate({
        src: criticalSrc,
        dest: criticalDest,
        inline: false,
        ignore: [],
        base: pkg.global.base,
        css: [
            pkg.styles.cssFile,
        ],
        minify: true,
        width: criticalWidth,
        height: criticalHeight
    }, (err, output) => {
        if (err) {
            plugins.fancyLog(plugins.chalk.magenta(err));
        }
        callback();
    });
}

//critical css task
gulp.task("criticalcss", ["styles"], (callback) => {
    doSynchronousLoop(pkg.critical, processCriticalCSS, () => {
        // all done
        callback();
    });
});


// Styleguide task
gulp.task('styleguide:generate', function() {
  return gulp.src( pkg.styles.stylegSRC )
    .pipe(plugins.sc5Styleguide.generate({
        title: pkg.global.projectName + ' Styleguide',
        server: true,
        rootPath: pkg.styles.stylegDest,

        overviewPath: 'README.md',
        port: 4000,
        disableEncapsulation: true
        // Import fonts for use in stylguide DOM
          /* extraHead: "<style>@import url('https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet');</style>"*/
      }))
    .pipe(gulp.dest(pkg.styles.stylegDest));
});

gulp.task('styleguide:applystyles', function() {
  return gulp.src( pkg.styles.cssFile )
    .pipe(plugins.sc5Styleguide.applyStyles())
    .pipe(gulp.dest( pkg.styles.stylegDest ));
});
gulp.task('styleguide', ['styleguide:generate', 'styleguide:applystyles']);


/* // Old critcal task
gulp.task('critical', function() {

  plugins.request(cssUrl).pipe(plugins.fs.createWriteStream(cssPath)).on('close', function() {
    plugins.criticalcss.getRules(cssPath, function(err, output) {
      if (err) {
        throw new Error(err);
      } else {
        plugins.criticalcss.findCritical( projectURL, { rules: JSON.parse(output) }, function(err, output) {
          if (err) {
            throw new Error(err);
          } else {

            plugins.fs.writeFile(includePath, output, function(err) {
              if(err) {
                return console.log(err);
              }
              console.log("Critical written to include!");
            });
          }
        });
      }
    });
  });

});




*/

// Watch task
gulp.task( 'default', ['styles', 'customJS', 'vendorsJs', 'pug', 'browser-sync'], function () {
 gulp.watch( pkg.watch.php, reload ); // Reload on PHP file changes.
 gulp.watch( pkg.watch.pug, [ 'pug', reload ] ); // Reload on PHP file changes.
 gulp.watch( pkg.watch.scss, [ 'styles' ] ); // Reloads browser and re-compiles on SCSS file changes
 gulp.watch( pkg.watch.js, [ 'customJS', reload ] ); // Reload, run jshint and run customJS task on file changes.
});
