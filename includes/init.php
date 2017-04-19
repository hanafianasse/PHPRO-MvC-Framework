<?php

 /*** Start the session ***/
 session_start();

 /*** include the controller class ***/
 include __SITE_PATH . '/application/' . 'controller_base.class.php';

 /*** include the registry class ***/
 include __SITE_PATH . '/application/' . 'registry.class.php';

 /*** include the router class ***/
 include __SITE_PATH . '/application/' . 'router.class.php';

 /*** include the template class ***/
 include __SITE_PATH . '/application/' . 'template.class.php';
 

 /*** auto load model classes ***/
    function __autoload($class_name) {
    $filename = strtolower($class_name) . '.class.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false)
    {
        return false;
    }
  include ($file);
}

 /*** load some healper classes ***/
include(__SITE_PATH . '/healpers/IBMException.class.php');
require __SITE_PATH . '/healpers/fb.php';

/*
FB::log('Log message');
FB::info('Info message');
FB::warn('Warn message');
FB::error('Error message');
*/

 /*** a new registry object ***/
 $registry = new registry;

 /*** create the database registry object ***/
 
 
 // big Probleme HERE
  $registry->db = db::getInstance();
?>
