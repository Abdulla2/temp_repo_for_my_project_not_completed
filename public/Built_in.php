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
  //array filter function that remove all null values from an array
  public function arr_filter($arr)
  {
    $data = array();
    foreach ($arr as $val)
      if(trim($val) != ""){
        $data[] = $val;
      }
    return $data;
  }
  public function Start_up_require(){
    require (ROOT.SEP."config".SEP."config.php"); // config file
    require (ROOT.SEP."public".SEP."controller.class"); //main controller class file
    require (ROOT.SEP."public".SEP."model.class"); //main model class file
     

  }
}

//$controller = new Built_in;
//Built_in->display_error("");

