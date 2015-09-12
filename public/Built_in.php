<?php
class Built_in
{
  public function display_error($message = "undefined error"){
    if(DEVELOPEMENT_ENV == true){
      echo $message;
    }
    // requiring 404 error page
    else {
      require (ROOT.SEP."application".SEP."controllers".SEP.c404_page.".php");
      $cont = c404_page;
      $controller = new $cont;
      call_user_func(array($controller,'index'));
    } 
  }
}

//$controller = new Built_in;
//Built_in->display_error("");

