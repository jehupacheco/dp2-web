var fs = require('fs-extra');
var path = require('path');
var node_modules = path.resolve('node_modules');
var gentelellaPath = path.resolve('node_modules/gentelella');
var public = path.resolve('public');

var folders = ['css', 'js', 'fonts'];

function chunk(files, dest, message = '') {
  fs.open(dest, 'w', function(err, fd) {
    files.map(function(file) {
      var data = fs.readFileSync(gentelellaPath + file);
      var buffer = new Buffer(data);
  
      fs.writeSync(fd, buffer, 0, buffer.length, null);
    });
  
    fs.close(fd, function() {
      console.log(message);
    });
  });
}


/********************/
/*  Clean builds   */
/********************/ 

console.log('Cleaning ...');

folders.map(function(folder){
  fs.removeSync(public + '/' + folder);
  fs.mkdirsSync(public + '/' + folder);
});

console.log('Copying files ...');

/********************/
/* Copy Stylesheets */
/********************/

var stylesheets = [
  '/vendors/bootstrap/dist/css/bootstrap.min.css',
  '/vendors/font-awesome/css/font-awesome.min.css',
  '/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css',
  '/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
  '/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
  '/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
  '/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
  // Added
  '/production/css/maps/jquery-jvectormap-2.0.3.css',
  '/vendors/nprogress/nprogress.css',
  '/vendors/iCheck/skins/flat/green.css',
  '/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
  '/vendors/bootstrap-daterangepicker/daterangepicker.css',
  // End - Added
  '/build/css/custom.min.css',
  
];

var stylesout = public + '/css/app.min.css';

chunk(stylesheets, stylesout, 'Styles written to: ' + stylesout);

/****************/
/* Copy Scripts */
/****************/

var scripts = [
  '/vendors/jquery/dist/jquery.min.js',
  '/vendors/bootstrap/dist/js/bootstrap.min.js',
  '/vendors/datatables.net/js/jquery.dataTables.min.js',
  '/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
  '/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
  '/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
  '/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
  '/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
  '/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
  '/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
  '/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',

  // Added 
  '/vendors/fastclick/lib/fastclick.js',
  '/vendors/nprogress/nprogress.js',
  '/vendors/Chart.js/dist/Chart.min.js',
  '/vendors/jquery-sparkline/dist/jquery.sparkline.min.js',

  '/vendors/bernii/gauge.js/dist/gauge.min.js',
  '/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
  '/vendors/iCheck/icheck.min.js',
  '/vendors/skycons/skycons.js',

  '/vendors/Flot/jquery.flot.js',
  '/vendors/Flot/jquery.flot.pie.js',
  '/vendors/Flot/jquery.flot.time.js',
  '/vendors/Flot/jquery.flot.stack.js',
  '/vendors/Flot/jquery.flot.resize.js',

  '/production/js/flot/jquery.flot.orderBars.js',
  '/production/js/flot/date.js',
  '/production/js/flot/jquery.flot.spline.js',
  '/production/js/flot/curvedLines.js',
  '/production/js/maps/jquery-jvectormap-2.0.3.min.js',
  '/production/js/moment/moment.min.js',
  '/production/js/datepicker/daterangepicker.js',
  '/production/js/maps/jquery-jvectormap-world-mill-en.js',
  '/production/js/maps/jquery-jvectormap-us-aea-en.js',
  '/production/js/maps/gdp-data.js',
  // End - Added
  '/build/js/custom.min.js',
];

var scriptsout = public + '/js/app.min.js';

chunk(scripts, scriptsout, 'Scripts written to: ' + scriptsout);

/**************/
/* Copy Fonts */
/**************/

// Bootstrap
fs.copySync(gentelellaPath + '/vendors/bootstrap/fonts/', public + '/fonts');

// Font awesome
fs.copySync(gentelellaPath + '/vendors/font-awesome/fonts/', public + '/fonts', {overwrite: true});
