<?php

define("SEP", DIRECTORY_SEPARATOR); //the seperator "/"
define("ROOT", realpath("")); //root dir

// require files
require (ROOT.SEP."config".SEP."config.php"); // config file
require (ROOT.SEP."public".SEP."controller.class"); //main controller class file
require (ROOT.SEP."public".SEP."model.class"); //main model class file
require (ROOT.SEP."public".SEP."Built_in.php"); // all the bultin functions
$Built_in = new Built_in ;


if(DEVELOPEMENT_ENV == false ){
    // don't show errors if not in a DEVELOPEMENT_ENV
    error_reporting(0);
}
require (ROOT.SEP."public".SEP."sys.php"); //main system routing  file

  
  





?>
