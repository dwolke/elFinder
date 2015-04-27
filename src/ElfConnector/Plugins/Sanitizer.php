<?php
/**
 * elFinder Plugin Sanitizer
 *
 * Sanitizer of file-name and file-path etc.
 *
 * @package elfinder
 * @author Naoki Sawada
 * @license New BSD
 */

namespace ElfConnector\Plugins;

class Sanitizer
{

  private $opts = array();

  public function __construct($opts)
  {

    $defaults = array(
      'enable'   => true,  // For control by volume driver
      'targets'  => array('\\','/',':','*','?','"','<','>','|'), // target chars
      'replace'  => '_'    // replace to this
    );
  
    $this->opts = array_merge($defaults, $opts);

  }
  
  public function cmdPreprocess($cmd, &$args, $elfinder, $volume)
  {

    $opts = $this->getOpts($volume);

    if (! $opts['enable']) {
      return false;
    }

    if (isset($args['name'])) {
      $args['name'] = $this->sanitizeFileName($args['name'], $opts);
    }

    return true;

  }

  public function onUpLoadPreSave(&$path, &$name, $src, $elfinder, $volume)
  {

    $opts = $this->getOpts($volume);

    if (! $opts['enable']) {
      return false;
    }

    if ($path) {
      $path = $this->sanitizeFileName($path, $opts, array('/'));
    }

    $name = $this->sanitizeFileName($name, $opts);

    return true;

  }

  private function getOpts($volume)
  {

    $opts = $this->opts;

    if (is_object($volume)) {

      $volOpts = $volume->getOptionsPlugin('Sanitizer');

      if (is_array($volOpts)) {
        $opts = array_merge($this->opts, $volOpts);
      }

    }

    return $opts;

  }
  
  private function sanitizeFileName($filename, $opts, $allows = array())
  {

    $targets = $allows? array_diff($opts['targets'], $allows) : $opts['targets'];

    return str_replace($targets, $opts['replace'], $filename);

  }

}
