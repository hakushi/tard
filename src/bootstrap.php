<?php
//Bootstrap functions

//Tard exeption handler
function myExceptionHandler($exception) {
  echo "Tard: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');

//Class autoloader
function myAutoloader($class) {
  $path = TARD_INSTALL_PATH . "/src/{$class}/{$class}.php";
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$class}' does not exists.");
  }
}
spl_autoload_register('myAutoloader');
