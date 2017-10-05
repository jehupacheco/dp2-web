var fs = require('fs-extra');
var path = require('path');
var node_modules = path.resolve('node_modules');
var public = path.resolve('public');

var folders = ['css', 'js', 'fonts'];

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

// Bootstrap
fs.copySync(node_modules + '/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', public + '/css/bootstrap.min.css');

// Font awesome
fs.copySync(node_modules + '/gentelella/vendors/font-awesome/css/font-awesome.min.css', public + '/css/font-awesome.min.css');

// Gentelella
fs.copySync(node_modules + '/gentelella/build/css/custom.min.css', public + '/css/gentelella.min.css');

/****************/
/* Copy Scripts */
/****************/

// Bootstrap
fs.copySync(node_modules + '/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', public + '/js/bootstrap.min.js');

// jQuery
fs.copySync(node_modules + '/gentelella/vendors/jquery/dist/jquery.min.js', public + '/js/jquery.min.js');

// Gentelella
fs.copySync(node_modules + '/gentelella/build/js/custom.min.js', public + '/js/gentelella.min.js');

/**************/
/* Copy Fonts */
/**************/

// Bootstrap
fs.copySync(node_modules + '/gentelella/vendors/bootstrap/fonts/', public + '/fonts');

// Font awesome
fs.copySync(node_modules + '/gentelella/vendors/font-awesome/fonts/', public + '/fonts', {overwrite: true});
