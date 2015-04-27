<?php

// Autoload files using Composer autoload
if (file_exists('../vendor/autoload.php')) {
  require_once __DIR__ . '/../vendor/autoload.php'; 
}

use ElfConnector\elFinderConnector;
use ElfConnector\elFinder;


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
  return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
    ? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
    :  null;                                    // else elFinder decide it itself
}


// Documentation for connector options:
// https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options
$opts = array(
  
  'debug' => true,

  // 'bind' => array(
  //  'upload.presave' => array(
  //    'Plugin.AutoResize.onUpLoadPreSave'
  //  ),
  // ),

  'roots' => array(
    array(

      'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
      'path'          => '../files/',         // path to files (REQUIRED)
      'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
      'accessControl' => 'access',             // disable and hide dot starting files (OPTIONAL)
      'mimeDetect'    => 'internal',

      // 'plugin' => array(
      //  'PluginAutoResize' => array(
      //    'enable'         => true,       // For control by volume driver
      //    'maxWidth'       => 1024,       // Path to Water mark image
      //    'maxHeight'      => 1024,       // Margin right pixel
      //    'quality'        => 95,         // JPEG image save quality
      //    'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP // Target image formats ( bit-field )
      //  )
      // )
    )
  )
);

$elf = new elFinder($opts);
$connector = new elFinderConnector($elf);
$connector->run();
