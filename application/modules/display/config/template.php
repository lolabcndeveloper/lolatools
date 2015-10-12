<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Active template
|--------------------------------------------------------------------------
|
| The $template['active_template'] setting lets you choose which template 
| group to make active.  By default there is only one group (the 
| "default" group).
|
*/

$config['active_template'] = 'default';

/* FRONT TEMPLATE */
$config['default']['template'] = 'default';

$config['default']['regions'] = array(
   'metas',
   'header',
   'crumbs',
   'content',
   //'sidebar',
   //'footer',
   'analytics'
);
$config['default']['template_regions'] = array(
    'metas',
    'header',
    //'footer',
    //'crumbs' ,
    'analytics'
);

$config['default']['parser'] = 'parser';
$config['default']['parser_method'] = 'parse';
$config['default']['parse_template'] = TRUE;

$config['default']['js_path'] = 'media/front/js/';
//$config['default']['javascripts'] = array('modernizr-2.5.3.min.js','jqcloud-1.0.2.min.js','jquery.masonry.min.js', 'jquery.cookie.js');
$config['default']['javascripts'] = array(
    'jquery-ui.min.js',
    'jquery.filestyle.mini.js',
    'jquery-ui.min.js',
    'jquery.validate.min.js',
    'jquery.form.min.js',
    'main.js'
);

$config['default']['css_path'] = 'media/front/css/';
$config['default']['stylesheets'] = array(
    'ui/jquery-ui.css',
    'style.css'
);

$config['default']['plugins'] = array(
    /*'reset',
	'grid'=>array('width'=>960, 'margin'=>10, 'columns'=>16)*/
	'jquery'=>array('version'=>'1.11.1')
);

/*
$config['default']['header_height'] = 100;
$config['default']['footer_height'] = 100;
*/





/* ADMIN TEMPLATE */
$config['admin']['template'] = 'admin';
$config['admin']['regions'] = array(
   'metas',
   'content'=>array('wrapper'=>'<section>', 'attributes'=>array('id'=>'content-wrapper')),
   'sidebar'=>array('wrapper'=>'<section>', 'attributes'=>array('id'=>'sidebar', 'dir'=>'ltr'))
   //'menusup'=>array('wrapper'=>'<section>', 'attributes'=>array('id'=>'menusup'))
);
$config['admin']['parser'] = 'parser';
$config['admin']['parser_method'] = 'parse';
$config['admin']['parse_template'] = FALSE;

$config['admin']['js_path'] = 'assets/js/';
$config['admin']['javascripts'] = array(
    'modernizr-2.5.3.min.js',
    'jquery-ui-1.8.18.custom.min.js',
    'jquery-ui-timepicker-addon.js',
    'jquery-ui-datepicker-lang.js' ,
    'admin.js','jquery.Jcrop.js',
    'jquery.dataTables.min.js',
    'jquery.dataTables.rowReordering.js',
    'jquery.uniform.min.js',
    'jquery.admin.js'
);

$config['admin']['css_path'] = 'assets/css/';
$config['admin']['stylesheets'] = array(
    'smoothness/jquery-ui-1.8.18.custom.css',
    'admin/base.css',
    'jquery.Jcrop.css',
    'uniform/uniform.default.css'
);

$config['admin']['plugins'] = array(
    'reset',
    /*'grid'=>array('width'=>960, 'margin'=>10, 'columns'=>16),*/
    'jquery'=>array('version'=>'1.7.2')
);

$config['admin']['header_height'] = 100;
$config['admin']['footer_height'] = 100;

$config['admin']['template_regions'] = array('metas', 'sidebar'/*,'menusup'*/);